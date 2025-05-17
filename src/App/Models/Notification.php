<?php

namespace Callmeaf\Notification\App\Models;

use Callmeaf\Base\App\Casts\NullableCollection;
use Callmeaf\Base\App\Enums\DateTimeFormat;
use Callmeaf\Base\App\Models\BaseNotificationModel;
use Callmeaf\Base\App\Traits\Model\HasDate;
use Callmeaf\Ticket\App\Notifications\Api\V1\TicketCreatedNotification;
use Callmeaf\User\App\Repo\Contracts\UserRepoInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class Notification extends BaseNotificationModel
{
    use HasDate;

    protected $casts = [];
    protected static function booted()
    {
        parent::booted();
        static::creating(function(Model $model) {
            $notificationsWithoutSenderId = collect(self::config()['notifications_without_sender_id'] ?? []);

            if(Auth::check() && ! $notificationsWithoutSenderId->contains(fn($item) => is_a($model->type,$item,true))) {
                $model->forceFill([
                    'sender_id' => Auth::user()->id,
                ]);
            }
        });
    }

    public static function configKey(): string
    {
        return 'callmeaf-notification';
    }

    protected function casts(): array
    {
        return [
            'data' => NullableCollection::class,
            'read_at' => 'datetime',
//            ...(self::config()['enums'] ?? []),
        ];
    }

    public function sender(): BelongsTo
    {
        /**
         * @var UserRepoInterface $userRepo
         */
        $userRepo = app(UserRepoInterface::class);
        return $this->belongsTo($userRepo->getModel()::class,'sender_id');
    }

    public function readAtText(DateTimeFormat $format = DateTimeFormat::DATE)
    {
        return match (app()->currentLocale()) {
            'fa' => $this->read_at ? verta($this->read_at)->format($format->value) : null,
            default => $this->read_at ? $this->read_at?->format($format->value) : null,
        };
    }
}
