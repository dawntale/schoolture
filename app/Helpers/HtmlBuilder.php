<?php

namespace App\Helpers;

class HtmlBuilder
{
	public static function action($model, $id)
	{
		return "<div class='d-block action-row'><a class='edit' href='". route('dashboard.'. $model .'.edit', $id) . "'>Edit</a> | <a class='view' href='" . route('dashboard.'. $model .'.show', $id) . "'>View</a></div>";
	}
}