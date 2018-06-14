<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use PhpParser\Node\Expr\Array_;
class Balance extends Model
{
    public $timestamps = false;

    public function deposit($value) : Array
    {
        DB::beginTransaction();
        $before = $this->amount ? $this->amount : 0;
        $this->amount += number_format($value,2,'.', '');
        $deposit = $this->save();
        
        $historic = auth()->user()->historics()->create([
            'type' => 'I',
            'amount' => $value,
            'total_before' => $before,
            'total_after' => $this->amount,
            'date' => date('Ymd')
        ]);
        if($deposit && $historic){
            DB::commit();
            return [
                'success' => true,
                'message' => 'Sucesso ao recarregar!'
            ];
        }else{
            DB::rollback();
            return [
                'success' => false,
                'message' => 'Falha ao recarregar.'
            ];
        }
    }
    
    public function withdraw(float $value):Array
    {
        if($this->amount < $value)
            return [
                'success' => false,
                'message' =>'Saldo insuficiente'
            ];
        
        DB::beginTransaction();
        $before = $this->amount ? $this->amount : 0;
        $this->amount -= number_format($value,2,'.', '');
        $withdraw = $this->save();
        
        $historic = auth()->user()->historics()->create([
            'type' => 'O',
            'amount' => $value,
            'total_before' => $before,
            'total_after' => $this->amount,
            'date' => date('Ymd')
        ]);
        if($withdraw && $historic){
            DB::commit();
            return [
                'success' => true,
                'message' => 'Sucesso ao retirar!'
            ];
        }else{
            DB::rollback();
            return [
                'success' => false,
                'message' => 'Falha ao retirar.'
            ];
        }
    }
}
