<?php

namespace App\Models;

use CodeIgniter\Model;

class BillingModel extends Model
{
    protected $table            = 'billing';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['reservation_id', 'item', 'price'];

    public function total_invoice($id)
    {
        return $this->db->table('billing')
            ->selectSum('price')
            ->where('reservation_id', $id)
            ->get();
    }
}
