<?php

namespace App\Filament\Resources\EmpresaResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\EmpresaResource;

class CreateEmpresa extends CreateRecord
{
    protected static string $resource = EmpresaResource::class;

//    function afterCreate(){
//        dd(EmpresaResource::getUrl('edit',['record'=>$this->record->id]));
//        return $this->redirect(EmpresaResource::getUrl('edit',['record'=>$this->record->id]));
//        dd('ok');
//
//    }
}
