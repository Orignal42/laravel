<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use Acme\StripeInspector\StripeInspector;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
class Appartement extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Appartement::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request){
    return [
        ID::make()->sortable(),

        Text::make('Title')
            ->sortable()
            ->rules('required', 'max:255'),

        Text::make('description')
            ->sortable()
            ->rules('required','max:255'),
        
        Number::make('price')
            ->sortable()
            ->rules('required','max:255'),

        Number::make('floor')
            ->sortable()
            ->rules('required','max:255'),
    
        Number::make('size')
            ->sortable()
            ->rules('required','max:255'),

        Text::make('address')
            ->sortable()
            ->rules('required','max:255'),
            
 
        Number::make('postcode')
            ->sortable()
            ->rules('required','max:255'),

        Text::make('city')
            ->sortable()
            ->rules('required','max:255'),
        

       
    ];
}

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
