<?php

abstract class AbstractObservable implements \SplSubject{


    //add observer
    public function attach(\SplObserver $observer) {
        $this->observers[] = $observer;
    }
   
    //remove observer
    public function detach(\SplObserver $observer) {
       
        $key = array_search($observer,$this->observers, true);
        if($key){
            unset($this->observers[$key]);
        }
    }


    //notify observers(or some of them)
    public function notify() {
        foreach ($this->observers as $value) {
            $value->update($this);
        }
    }



}