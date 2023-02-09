<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Avatar;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Slug;
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
                ->prunable()
                ->disk('public'),
            Slug::make('Slug')->from('Location', 'location_name')->hideFromIndex(),
            Avatar::make('Banner Image', 'banner_image')
                ->prunable()
                ->disk('public'),
            Text::make('Leader Name', 'pastors_name')
                ->rules('required', 'min:2', 'max:225')
                ->required()
                ->sortable(),
            Select::make('Leaders Level', 'pastors_level')
                ->rules('required')
                ->required()
                ->options([
                    'Cluster Leader'   => 'Cluster Leader',
                    'Cluster Leaders'  => 'Cluster Leaders',
                    'Location Pastor'  => 'Location Pastor',
                    'Location Pastors' => 'Location Pastors',
                    'Network Leader'   => 'Network Leader',
                    'Network Leaders'  => 'Network Leaders',
                    'Movement Leaders' => 'Movement Leaders',
                ])->sortable(),
            Text::make('Location', 'location_name')->rules('required')->required()->sortable(),
            Text::make('Address')->rules('required')->required()->hideFromIndex(),
            HasMany::make('Activities', 'activities', \App\Nova\LocationActivity::class)->hideFromIndex(),
            Trix::make('Description'),
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
