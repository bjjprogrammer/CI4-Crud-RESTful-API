<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\IncomingRequest;

class Person extends ResourceController
{
	protected $modelName = 'App\Models\PersonModel';
    protected $format    = 'json';

	public function __construct() {
		$this->model = model('PersonModel');
		$this->request = service('request');
	}
	
	/**
	 * Return an array of resource objects, themselves in array format
	 *
	 * @return mixed
	 */
	public function index()
	{
		//Todos los registros
		return $this->respond($this->model->findAll(),200);
	}

	/**
	 * Return the properties of a resource object
	 *
	 * @return mixed
	 */
	public function show($id = null)
	{
		//Solo un registro
		return $this->respond($this->model->find($id),200);
	}

	/**
	 * Create a new resource object, from "posted" parameters
	 *
	 * @return mixed
	 */
	public function create()
	{
		//Crear un registro
		$this->model->insert($this->request->getRawInput());
        $idPerson = $this->model->getInsertID();
		$newPerson = $this->model->find($idPerson);
		return $this->respondCreated($newPerson);
	}


	/**
	 * Add or update a model resource, from "posted" properties
	 *
	 * @return mixed
	 */
	public function update($id = null)
	{
		//Crear un registro
		$personUpdate = $this->request->getRawInput();
		$personUpdate['id'] = $id;
		$this->model->save($personUpdate);
		$updatedPerson = $this->model->find($id);
		return $this->respondUpdated($updatedPerson);
	}

	/**
	 * Delete the designated resource object from the model
	 *
	 * @return mixed
	 */
	public function delete($id = null)
	{
		//Eliminar un registro
		$this->model->delete($id);
		return $this->respondDeleted('Elminado exitosamente');
	}
}
