<?php





use App\Http\Controllers\DataPengajuanController;














Route :: get('admin/pengajuan',[DataPengajuanController::class,'index']);
Route::get('/admin/pengajuan', [DataPengajuanController::class, 'index'])->name('admin.submissions.index');
