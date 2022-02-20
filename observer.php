<?php

class Model
{
    protected $observers;

    public function __construct()
    {
        $this->observers = new SplObjectStorage();
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function setObservers($observers = [])
    {
        foreach ($observers as $observer) {
            $this->observers->attach($observer);
        }
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
        // notify the observers, that model has been updated
        $this->notify();
    }
}

class Post extends Model
{
    public function insert($data)
    {
        // Store the data
        // Notify to observers
        $this->notify();
    }

    public function update($data)
    {
        // Update the model
        // Notify to observers
        $this->notify();
    }

    public function delete($id)
    {
        // Delete the model
        // Notify to observers
        $this->notify();
    }
}

class PostModelObserver
{
    public function update($subject)
    {
        echo get_class($subject) . ' has been updated' . '<br>';
    }
}

class Observer2
{
    public function update($subject)
    {
        echo get_class($subject) . ' has been updated' . '<br>';
    }
}

$post = new Post();

$post->setObservers([new PostModelObserver, new Observer2]);

$post->title = 'Hello World';