<?php

interface StorableInterface
{
    public function store($input);
    public function update($id, $input);
}
