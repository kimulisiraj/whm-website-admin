<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Avatar;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Menu\MenuItem;

class Location extends Resource
{
    public static $showColumnBorders = true;

//    public static $tableStyle = 'tight';

    public static $model = \App\Models\Location::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'location_name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'pastors_name', 'location_name'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param NovaRequest $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Avatar::make('Pastors Image', 'pastors_image')
                ->rules('required')
                ->prunable()
                ->disk('public'),
            Avatar::make('Banner Image', 'banner_image')
                ->rules('required')
                ->prunable()
                ->disk('public'),
            Text::make('Leader Name', 'pastors_name')->required()->sortable(),
            Select::make('Leaders Level', 'pastors_level')
                ->required()
                ->options([
                    'Network Leader' => 'Network Leader',
                    'Cluster Leader' => 'Cluster Leader',
                    'Location Pastor' => 'Location Pastor',
                    'Location Pastors' => 'Location Pastors'
                ])->sortable(),
            Text::make('Location', 'location_name')->rules('required')->required()->sortable(),
            Text::make('Address')->rules('required')->required()->hideFromIndex(),
            HasMany::make('Activities', 'activities', \App\Nova\LocationActivity::class)->hideFromIndex(),
            Text::make('Description'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param NovaRequest $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param NovaRequest $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param NovaRequest $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param NovaRequest $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }

    public function menu(Request $request): MenuItem
    {
        return parent::menu($request)->withBadge(function () {
            return static::$model::count();
        });
    }
}
