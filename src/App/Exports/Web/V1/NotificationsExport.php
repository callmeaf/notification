<?php

namespace Callmeaf\Notification\App\Exports\Web\V1;

use Callmeaf\Notification\App\Models\Notification;
use Callmeaf\Notification\App\Repo\Contracts\NotificationRepoInterface;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomChunkSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Excel;

class NotificationsExport implements FromCollection,WithHeadings,Responsable,WithMapping,WithCustomChunkSize
{
    use Exportable;

    /**
     * It's required to define the fileName within
     * the export class when making use of Responsable.
     */
    private $fileName = '';

    /**
     * Optional Writer Type
     */
    private $writerType = Excel::XLSX;

    /**
     * Optional headers
     */
    private $headers = [
        'Content-Type' => 'text/csv',
    ];

    private NotificationRepoInterface $notificationRepo;
    public function __construct()
    {
        $this->notificationRepo = app(NotificationRepoInterface::class);
        $this->fileName = $this->fileName ?: \Base::exportFileName(model: $this->notificationRepo->getModel()::class,extension: $this->writerType);
    }

    public function collection()
    {
        if(\Base::getTrashedData()) {
            $this->notificationRepo->trashed();
        }

        $this->notificationRepo->latest()->search();

        if(\Base::getAllPagesData()) {
            return $this->notificationRepo->lazy();
        }

        return $this->notificationRepo->paginate();
    }

    public function headings(): array
    {
        return [
           // 'status',
        ];
    }

    /**
     * @param Notification $row
     * @return array
     */
    public function map($row): array
    {
        return [
            // $row->status?->value,
        ];
    }

    public function chunkSize(): int
    {
        return \Base::config('export_chunk_size');
    }
}
