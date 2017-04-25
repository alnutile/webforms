<?php

return [
    'defaults' => [
        'name' => [
            'sort' => 1,
            'show_element' => false,
            'field_element' => "input",
            'default_value' => "Foo Bar",
            "title" => "Name",
            "required" => true,
            "rules" => ['required', 'min:3', 'max:30']
        ],
        "country" => [
            "sort" => 2,
            "show_element" => "ul",
            "field_element" => "multiple_select",
            "default_value" => "foo_bar",
            "values" => [
                "foo_bar" => "Bar",
                "foo_baz" => "Baz",
                "foo_boo" => "Boo",
            ],
            "title" => "Country"
        ],
        "description" => [
            "sort" => 3,
            "show_element" => "p",
            "field_element" => "textarea",
            "default_value" => "Some info here",
            "title" => "Description"
        ]
    ]
];