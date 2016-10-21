<?php
namespace Golem\Auth\Storage;

use Aura\Session\SegmentInterface;

class AuraSessionStorage implements StorageInterface
{
    /**
     * @var SegmentInterface
     */
    private $session;

    /**
     * @var string
     */
    private $namespace;

    public function __construct(SegmentInterface $session, $namespace = 'golem_auth')
    {
        $this->session = $session;
        $this->namespace = $namespace;
    }

    /**
     * @param string|int $id
     * @return void
     */
    public function store($id)
    {
        $this->session->set($this->namespace, $id);
    }

    /**
     * @return string|int
     */
    public function read()
    {
        return $this->session->get($this->namespace);
    }

    /**
     * @return bool
     */
    public function exists()
    {
        return !is_null($this->session->get($this->namespace));
    }

    /**
     * Clears out identity
     */
    public function clear()
    {
        $this->session->set($this->namespace, null);
    }
}
