<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        // Spark Related Events
        // User Related Events...
        'Laravel\Spark\Events\Auth\UserRegistered' => [
            'Laravel\Spark\Listeners\Subscription\CreateTrialEndingNotification',
        ],

        'Laravel\Spark\Events\Subscription\UserSubscribed' => [
            'Laravel\Spark\Listeners\Subscription\UpdateActiveSubscription',
            'Laravel\Spark\Listeners\Subscription\UpdateTrialEndingDate',
        ],

        'Laravel\Spark\Events\Profile\ContactInformationUpdated' => [
            'Laravel\Spark\Listeners\Profile\UpdateContactInformationOnStripe',
        ],

        'Laravel\Spark\Events\PaymentMethod\VatIdUpdated' => [
            'Laravel\Spark\Listeners\Subscription\UpdateTaxPercentageOnStripe',
        ],

        'Laravel\Spark\Events\PaymentMethod\BillingAddressUpdated' => [
            'Laravel\Spark\Listeners\Subscription\UpdateTaxPercentageOnStripe',
        ],

        'Laravel\Spark\Events\Subscription\SubscriptionUpdated' => [
            'Laravel\Spark\Listeners\Subscription\UpdateActiveSubscription',
        ],

        'Laravel\Spark\Events\Subscription\SubscriptionCancelled' => [
            'Laravel\Spark\Listeners\Subscription\UpdateActiveSubscription',
        ],

        // Team Related Events...
        'Laravel\Spark\Events\Teams\TeamCreated' => [
            'Laravel\Spark\Listeners\Teams\Subscription\CreateTrialEndingNotification',
        ],

        'Laravel\Spark\Events\Teams\Subscription\TeamSubscribed' => [
            'Laravel\Spark\Listeners\Teams\Subscription\UpdateActiveSubscription',
            'Laravel\Spark\Listeners\Teams\Subscription\UpdateTrialEndingDate',
        ],

        'Laravel\Spark\Events\Teams\Subscription\SubscriptionUpdated' => [
            'Laravel\Spark\Listeners\Teams\Subscription\UpdateActiveSubscription',
        ],

        'Laravel\Spark\Events\Teams\Subscription\SubscriptionCancelled' => [
            'Laravel\Spark\Listeners\Teams\Subscription\UpdateActiveSubscription',
        ],

        'Laravel\Spark\Events\Teams\UserInvitedToTeam' => [
            'Laravel\Spark\Listeners\Teams\CreateInvitationNotification',
        ],
        //End Of Spark Related Events

        // Start of Promo Related Events
        'Laravel\app\Events\Promotions\PromotionCreated' => [
            'Laravel\app\Listeners\Promotions\CreatePromotionsVerifiedPayoutNotification',
            'Laravel\app\Listeners\Promotions\CreatePromotionEndingNotification',
        ],

        'Laravel\app\Events\Promotions\PromotionCancelled' => [
            'Laravel\app\Listeners\Promotions\RemovePromotionProposals',
            'Laravel\app\Listeners\Promotions\CreateTeamNotification',
        ],

        'Laravel\app\Events\Promotions\PromotionCompleted' => [
            'Laravel\app\Listeners\Promotions\CreatePromotionCompletedNotification'
        ],

        'Laravel\app\Events\Promotions\PromotionProposalled' => [
            'Laravel\app\Listeners\Promotions\Proposals\CreateProposalsNotification',
        ],

        'Laravel\app\Events\Promotions\PromotionsProposalAccepted' => [
            'Laravel\app\Listeners\Promotions\Proposals\CreateProposalAcceptedNotification',
        ],

        'Laravel\app\Events\Promotions\PromotionsPropsalDeclined' => [
            'Laravel\app\Listeners\Promotions\Proposals\CreateProposalDeclinedNotification',
            'Laravel\app\Listeners\Promotions\Proposals\UpdatePromotionProposal',
        ]

        'Laravel\app\Events\Promotions\PromotionsPropsalPayment' => [
            'Laravel\app\Listeners\Promotions\Proposals\CreateProposalPaidNotification',
        ],

        'Laravel\app\Events\Promotions\ProposalMessageCreated' => [
            'Laravel\app\Listeners\Promotions\Proposals\CreateProposalNewMessageNotification',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
