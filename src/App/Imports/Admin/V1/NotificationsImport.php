<?php

namespace Callmeaf\Notification\App\Imports\Admin\V1;

use Callmeaf\Base\App\Services\Importer;
use Callmeaf\Notification\App\Enums\NotificationStatus;
use Callmeaf\Notification\App\Repo\Contracts\NotificationRepoInterface;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class NotificationsImport extends Importer implements ToCollection,WithChunkReading,WithStartRow,SkipsEmptyRows,WithValidation,WithHeadingRow
{
    private NotificationRepoInterface $notificationRepo;

    public function __construct()
    {
        $this->notificationRepo = app(NotificationRepoInterface::class);
    }

    public function collection(Collection $collection)
    {
        $this->total = $collection->count();

        foreach ($collection as $row) {
            $this->notificationRepo->freshQuery()->create([
                // 'status' => $row['status'],
            ]);
            ++$this->success;
        }
    }

    public function chunkSize(): int
    {
        return \Base::config('import_chunk_size');
    }

    public function startRow(): int
    {
        return 2;
    }

    public function rules(): array
    {
        $table = $this->notificationRepo->getTable();
        return [
            // 'status' => ['required',Rule::enum(NotificationStatus::class)],
        ];
    }

}
