<?php
use Illuminate\Support\ViewErrorBag;

/*
|--------------------------------------------------------------------------
| Standard fields
|--------------------------------------------------------------------------
*/
/**
 * Add an input field
 * @param string $name The field name
 * @param string $title The field title
 * @param object $errors The laravel errors object
 * @param null|object $object The entity of the field
 */
Form::macro('normalInputCol', function ($col, $name, $title, ViewErrorBag $errors, $object = null, array $options = []) {
    $options = array_merge(['class' => "form-control", 'placeholder' => $title], $options);

    $string  = "<div class='col col-md-".$col."'><div class='form-group " . ($errors->has($name) ? ' has-error' : '') . "'>";
    $string .= Form::label($name, $title);

    if (is_object($object)) {
        $currentData = $object->{$name} ?: '';
    } else {
        $currentData = null;
    }

    $string .= Form::text($name, Input::old($name, $currentData), $options);
    $string .= $errors->first($name, '<span class="help-block">:message</span>');
    $string .= "</div></div>";

    return $string;
});

Form::macro('normalTextareaCol', function ($col, $name, $title, ViewErrorBag $errors, $object = null, array $options = []) {
    $options = array_merge(['class' => 'ckeditor', 'rows' => 10, 'cols' => 10], $options);

    $string  = "<div class='col col-md-".$col."'><div class='form-group " . ($errors->has($name) ? ' has-error' : '') . "'>";
    $string .= Form::label($name, $title);

    if (is_object($object)) {
        $currentData = $object->{$name} ?: '';
    } else {
        $currentData = null;
    }

    $string .= Form::textarea($name, Input::old($name, $currentData), $options);
    $string .= $errors->first($name, '<span class="help-block">:message</span>');
    $string .= "</div></div>";

    return $string;
});

/**
 * Add a checkbox input field
 * @param string $name The field name
 * @param string $title The field title
 * @param object $errors The laravel errors object
 * @param null|object $object The entity of the field
 */
Form::macro('normalCheckboxCol', function ($col, $name, $title, ViewErrorBag $errors, $object = null) {
    $string = "<div class='col col-md-".$col."'><div class='form-group'
    style='padding-top:10px;padding-bottom:8px;'><div class='checkbox" . 
    ($errors->has($name) ? ' has-error' : '') . "'>";
    $string .= "<input type='hidden' value='0' name='{$name}'/>";
    $string .= "<label for='$name'>";
    $string .= "<input id='$name' name='$name' type='checkbox' class='flat-blue'";

    if (is_object($object)) {
        $currentData = isset($object->$name) && (bool) $object->$name ? 'checked' : '';
    } else {
        $currentData = false;
    }

    $oldInput = Input::old($name, $currentData) ? 'checked' : '';
    $string .= "value='1' {$oldInput}>";
    $string .= $title;
    $string .= $errors->first($name, '<span class="help-block">:message</span>');
    $string .= "</label>";
    $string .= "</div></div></div>";

    return $string;
});

/**
 * Add a dropdown select field
 * @param string $name The field name
 * @param string $title The field title
 * @param object $errors The laravel errors object
 * @param array $choice The choice of the select
 * @param null|array $object The entity of the field
 */
Form::macro('normalSelectCol', function ($col, $name, $title, ViewErrorBag $errors, array $choice, $object = null, array $options = []) {
    if (array_key_exists("multiple", $options)) {
        $nameForm = $name . '[]';
    } else {
        $nameForm = $name;
    }

    $string = "<div class='col col-md-".$col."'><div class='form-group dropdown" . ($errors->has($name) ? ' has-error' : '') . "'>";
    $string .= "<label for='$nameForm'>$title</label>";

    if (is_object($object)) {
        $currentData = isset($object->$name) ? $object->$name : '';
    } else {
        $currentData = false;
    }

    /* Bootstrap default class */
    $array_option = ['class' => 'form-control'];

    if (array_key_exists("class", $options)) {
        $array_option = ['class' => $array_option['class'] . ' ' . $options['class']];
        unset($options['class']);
    }

    $options = array_merge($array_option, $options);

    $string .= Form::select($nameForm, $choice, Input::old($nameForm, $currentData), $options);
    $string .= $errors->first($name, '<span class="help-block">:message</span>');
    $string .= "</div></div>";

    return $string;
});