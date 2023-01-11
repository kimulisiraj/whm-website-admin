<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Avatar;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;

class ChurchEvent extends Resource
{
    public static $indexDefaultOrder = [
        'starts_at' => 'desc',
    ];
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\ChurchEvent>
     */
    public static $model = \App\Models\ChurchEvent::class;

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
       'title',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Avatar::make('Image', 'banner_image')->prunable()->disk('public'),
            Text::make('Title')->rules('required', 'min:3', 'max:100')->required(),
            DateTime::make('Starts At')
                ->rules(['after:yesterday', 'required'])
                ->required(),
            DateTime::make('Ends At')
                ->rules(['after:starts_at', 'required'])
                ->required(),
            Text::make('Description')->hideFromIndex()->required(),
            Text::make('Link')->rules('required', 'url')->hideFromIndex()->required(),
            Text::make('Link Text')->rules('required', 'min:3', 'max:20')->hideFromIndex()->required(),

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
