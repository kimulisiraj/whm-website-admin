<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Menu\MenuItem;

class Devotional extends Resource
{
    public static $model = \App\Models\Devotional::class;

    public static $title = 'title';

    public static $search = [
        'title',
        'author'
    ];


    public function fields(NovaRequest $request): array
    {
        return [
            Date::make('Published At')->nullable(),
            Slug::make('Slug')->from('Title')->hideFromIndex()->hideWhenCreating(),
            Text::make('Title')->rules('required', 'min:2', 'max:225')->required(),
            Text::make('Author')->rules('min:2', 'max:225')->nullable(),
            Text::make('Summary')->rules('required', 'max:225')->hideFromIndex()->required(),
            Trix::make('body')->rules('required')->required(),
        ];
    }

    public function cards(NovaRequest $request): array
    {
        return [];
    }


    public function filters(NovaRequest $request)
    {
        return [];
    }

    public function lenses(NovaRequest $request)
    {
        return [];
    }

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
