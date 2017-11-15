<?php

class PostBitmaskMarkingStore implements \Symfony\Component\Workflow\MarkingStore\MarkingStoreInterface
{

    /**
     * Gets a Marking from a subject.
     *
     * @param object $subject A subject
     *
     * @return \Symfony\Component\Workflow\Marking The marking
     */
    public function getMarking($subject)
    {
        // TODO: Implement getMarking() method.
    }

    /**
     * Sets a Marking to a subject.
     *
     * @param object                              $subject A subject
     * @param \Symfony\Component\Workflow\Marking $marking A marking
     */
    public function setMarking($subject, \Symfony\Component\Workflow\Marking $marking)
    {
        // TODO: Implement setMarking() method.
    }
}
