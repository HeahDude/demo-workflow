<?php

namespace AppBundle\WorkFlow;

use AppBundle\Entity\Post;
use Symfony\Component\Workflow\Marking;
use Symfony\Component\Workflow\MarkingStore\MarkingStoreInterface;

class PostBitmaskMarkingStore implements MarkingStoreInterface
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
        if (!$subject instanceof Post) {
            throw new \InvalidArgumentException('Expecting "%s" but got ...');
        }

        $statuses = $subject->getStatus();
        $places = [];

        foreach (Post::STATES as $place => $state) {
            if ($statuses & $state) {
                $places[$place] = 1;
            }
        }

        return new Marking($places);
    }

    /**
     * Sets a Marking to a subject.
     *
     * @param object                              $subject A subject
     * @param \Symfony\Component\Workflow\Marking $marking A marking
     */
    public function setMarking($subject, Marking $marking)
    {
        if (!$subject instanceof Post) {
            throw new \InvalidArgumentException('Expecting "%s" but got ...');
        }

        $mask = 0;

        foreach ($marking->getPlaces() as $place) {
            $mask += Post::STATES[$place];
        }

        $subject->setStatus($mask);
    }
}
