<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $table = 'products';
    protected $fillable = [
    'productId',
    'productName',
    'productDescription',
    'productType',
    'uploadedBy'

    ];

   protected $primaryKey = 'productId';

    // public function productUploads()
    // {
    //     return $this->belongsTo(DocumentUpload::class, 'uploadedBy', 'documentId');
    // }

    //  public function inventory()
    // {
    //     return $this->belongsTo(Inventory::class, 'inventoryId', 'inventoryId');
    // }

     public function product_type()
    {
        return $this->belongsTo(ProductType::class, 'productType', 'typeId');
    }

    public function uploaded_by()
    {
        return $this->belongsTo(User::class, 'uploadedBy', 'id');
    }
}
