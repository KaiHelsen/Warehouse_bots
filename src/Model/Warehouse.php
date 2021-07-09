<?php


namespace App\Model;


class Warehouse
{
    private array $cells;
    private array $robots;

    private function __construct(array $cells)
    {
        $this->cells = $cells;
    }
    public static function fromArray(array $decodedJson): Warehouse
    {
        $cellData = $decodedJson["cells"];
        $cells = [];
            foreach($cellData as $i => $cell)
            {
                $cells[]  = Cell::fromArray($cell);
            }

        return new Warehouse($cells);
//    {
//        "cells": [
//    {
//        "x": 1,
//      "y": 1,
//      "ingredient": "Apple",
//      "robot": true
//    }
//  ]
    }

    private function AddRobot(Robot $robot) : void
    {

    }

}