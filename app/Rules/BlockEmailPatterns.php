<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Validator;

class BlockEmailPatterns implements ValidationRule
{

    private $messageAdded = false; // Flag to ensure only one message is added

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $defaultMessage = sprintf("The %s is not accepted", $attribute);
        foreach ($this->patterns() as $pattern) {
            $regex = '/' . str_replace('*', '.*', preg_quote($pattern, '/')) . '$/i';
            if (preg_match($regex, $value)) {
                if (!$this->messageAdded) {
                    // Check if the custom message exists in the validation error messages
                    $customMessage = $this->getCustomMessage($attribute);

                    // Use the custom message if defined, otherwise use the default
                    $fail($customMessage ?: $defaultMessage);
                    $this->messageAdded = true; // Ensure only one message is added
                }
                return;
            }
        }
    }


    protected function patterns()
    {
        return array(
            '*.ru',
            '*.cn',
            '*yopmail.com',
            '*mailinator.com',
            '*guerrillamail.com',
            '*10minutemail.com',
            '*temp-mail.org',
            '*tempmail.com',
            '*throwawaymail.com',
            '*maildrop.cc',
            '*trashmail.com',
            '*fakeinbox.com',
            '*dispostable.com',
            '*getnada.com',
            '*mailcatch.com',
            '*moakt.com',
            '*mytrashmail.com',
            '*spamgourmet.com',
            '*sharklasers.com',
            '*spam4.me',
            '*temporarymail.com',
            '*trashmail.de',
        );
    }

    // Helper method to get the custom message from the validator
    protected function getCustomMessage(string $attribute): ?string
    {
         // Fetch the message from the validator instance
         $validator = Validator::make([], [
            $attribute => 'block_email_patterns',
        ]);
        $messages = $validator->messages();
        return $messages->get($attribute)[0] ?? null;
    }
}
