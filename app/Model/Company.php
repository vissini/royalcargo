<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    const COMPANY_TYPE = [
        1 => 'Fisíca',
        2 => 'Jurídica',
    ];

    protected $fillable = [
        'city',
        'name',
        'company_type',
        'document_number',
        'date_birth',
        'rg',
        'fantasy_name'
    ];

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function getDocumentNumberFormattedAttribute(){
        $document = $this->document_number;
        if(!empty($document)){
            if(strlen($document) == 11){
                $document = preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/','$1.$2.$3-$4',$document);
            }elseif(strlen($document) == 14){
                $document = preg_replace('/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/','$1.$2.$3/$4-$5',$document);
            }
        }
        return $document;
    }

    public function setDocumentNumberAttribute($value){
        $this->attributes['document_number'] = preg_replace('/[^0-9]/','',$value);
    }
}
