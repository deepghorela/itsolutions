<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Navigation;
use App\Models\Location;


class PagesController extends Controller
{
    /**
     * List all pages
     *
     * @param Request $request
     * @param string $alias
     * @return void
     */
    public function index(Request $request, $alias=NULL){
        if(empty($alias)){
            $alias = 'home';
        }
        $pageExists = Page::checkSlugExists($alias);
        if((!$pageExists || $pageExists->count() < 1) && ($alias !='blogs')){
            abort(404);
        }

        //If Page not active then return to Home
        if($pageExists->status != 'ACTIVE'){
            return redirect(url('/'));
        }

        $pageData = array(
            'title' => ($alias != 'home' ? $pageExists->title ." | ".env('APP_NAME').env('DEFAULT_TITLE_SUFFIX') : env('APP_NAME')),
            'heading' => ($alias != 'home' ? $pageExists->title : ''),
            'meta_keywords' => !empty($pageExists->meta_keywords) ? $pageExists->meta_keywords : env('META_KEYWORDS'),
            'meta_description' => !empty($pageExists->meta_description) ? $pageExists->meta_description : env('META_DESCRIPTION'),
            'body' => $pageExists->body,
            'slug' => $pageExists->slug,
            'image' => $pageExists->image,
            'page' => $pageExists,
        );

        $mainMenu = Navigation::getMenuItems();
        $preparedMainMenu = prepareMainMenu($mainMenu);
        $pageData['mainMenu'] = $preparedMainMenu;

        //Footer Menu
        $mainMenu = Navigation::getMenuItems("Footer");
        $preparedfooterMenu = prepareMainMenu($mainMenu, "footer");
        $pageData['footerMenu'] = $preparedfooterMenu;

        if($pageData['slug'] == 'contact-us'){
            $locations = Location::getList()->toArray();
            $pageData['locations'] = $locations;
            if(!empty($pageData['locations'])){
                foreach($pageData['locations'] as $loc){
                    if(!empty($loc['latitude']) && !empty($loc['longitude'])){
                        $latLongs[]= array($loc['latitude'], $loc['longitude']);
                        $latLongJson[]= array(
                            "lat" => $loc['latitude'],
                            "lng" => $loc['longitude'],
                            "name" => "<strong>".env('APP_NAME')."</strong><br>".$loc['title']."<br><br>".$loc['city'].", ".$loc['district'].",<br>".$loc['state']." - ".$loc['pincode']
                            ."<br><a href=https://www.google.com/maps/dir/?api=1&destination=".$loc['latitude'].",".$loc['longitude']." target=_blank class=mapDirection>Directions</a>"
                        );
                    }
                }
                if(!empty($latLongs)){
                    $centerOfMap = getCenterFromDegrees($latLongs);
                    $pageData['mapCenterCoordinates'] = $centerOfMap;
                    $pageData['latLongs'] = json_encode($latLongJson);
                }
            }
        }elseif($pageData['slug'] == 'blogs'){
            // $pageData['posts'] = Post::where('status', 'PUBLISHED')->orderBy('date_published', 'desc')->simplePaginate(6);
        }

        //Location details for schema
        $primaryLocation = Location::getRegisteredOffice();
        $schemaJsonArray = array();
        if(!empty($primaryLocation)){
            $schemaJsonArray = array(
                getBusinessSchema($primaryLocation, $pageData),
                getBreadCrumb($pageData),
                getLocalBusinessSchema($primaryLocation),
                getComputerStoreSchema($primaryLocation),
            );
            $schemaJsonArray = array_filter($schemaJsonArray);
        }
        
        $pageData['schemaJson'] = json_encode(array_values($schemaJsonArray));

        return view('pages.page-layout')->with($pageData);
    }
}
