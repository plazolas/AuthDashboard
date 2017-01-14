<?php
/**
 * Oswald Plazola
 */
/**
 * Interface for mysqli crud.
 *
 * Classes implementing this interface may be registered by name or instance.
 */

//namespace Model;

interface CrudsInterface
{
    /**
     * Open
     *
     * Open database connection.
     *
     * @return void
     */
    public function open(); 
    /**
     * close
     *
     * Close database connection.
     *
     * @return void
     */
    public function close();
    
    /**
     * Create
     *
     * Inserts a row on table.
     *
     * @param stdClass $Obj
     * @return (int) id autoincrement for the new row
     */
    public function create(stdClass $Obj);
    
    /**
     * Set
     *
     * Updates a row on table.
     *
     * @param stdClass $Obj
     * @return int id          id of autoincrement for the new row
     */
    public function set(stdClass $Obj);
    
    /**
     * Delete
     *
     * Deletes a row from table.
     *
     * @param int $id           id of row to be deleted
     * @return boolean          true always
     */
    public function delete($id);
    
    /**
     * Get
     *
     * gets a row from table.
     *
     * @param  int $id           id of row
     * @return array             value paired array of row or empty array if row not found
     */
    public function get($id);
    
     /**
     * get_all
     *
     * gets all rows from table.
     *
     * @return array of arrays
     */
    public function get_all ();
    
     /**
     * getCollection
     *
     * gets all rows from table.
     *
     * @return array of arrays
     */
    public function getCollection ();
}
