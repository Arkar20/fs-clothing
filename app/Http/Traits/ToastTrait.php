<?php

namespace App\Http\Traits;

trait ToastTrait
{
    public function successAlert($message)
    {
        return $this->alert('success', $message, [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'text' => '',
            'confirmButtonText' => 'Ok',
            'cancelButtonText' => 'Cancel',
            'showCancelButton' => false,
            'showConfirmButton' => false,
        ]);
    }

    public function errorAlert($message = 'Delete Success')
    {
        return $this->alert('error', $message, [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'text' => '',
            'confirmButtonText' => 'Ok',
            'cancelButtonText' => 'Cancel',
            'showCancelButton' => false,
            'showConfirmButton' => false,
        ]);
    }
    public function confirmDialog(
        $messageDialog = 'Are You Sure You Want To Delete This?'
    ) {
        return $this->confirm($messageDialog, [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'cancelButtonText' => 'Cancel',
            'onConfirmed' => 'confirmed',
            'onCancelled' => 'cancelled',
        ]);
    }
    public function cancelled()
    {
    }
    public function confirmDialogForItemdetail(
        $messageDialog = 'Are You Sure You Want To Delete This?'
    ) {
        return $this->confirm($messageDialog, [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'cancelButtonText' => 'Cancel',
            'onConfirmed' => 'confirmeddetail',
            'onCancelled' => 'cancelled',
        ]);
    }
}
