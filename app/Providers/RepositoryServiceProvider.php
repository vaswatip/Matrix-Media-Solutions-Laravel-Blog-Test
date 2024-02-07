<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Contracts\User\UserContract;
use App\Repositories\User\UserRepository;
use App\Contracts\Post\PostContract;
use App\Repositories\Post\PostRepository;
// use App\Contracts\Auth\AuthContract;
// use App\Repositories\Auth\AuthRepository;
// use App\Contracts\Account\AccountContract;
// use App\Repositories\Social\SocialRepository;
// use App\Contracts\Social\SocialContract;
// use App\Repositories\Account\AccountRepository;
// use App\Contracts\Location\LocationContract;
// use App\Repositories\Location\LocationRepository;
// use App\Repositories\Location\TimezoneRepository;
// use App\Contracts\Location\TimezoneContract;
// use App\Contracts\Game\GameContract;
// use App\Repositories\Game\GameRepository;
// use App\Contracts\Game\PlatformContract;
// use App\Repositories\Game\PlatformRepository;
// use App\Contracts\Game\GameRankContract;
// use App\Repositories\Game\GameRankRepository;
// use App\Contracts\Club\ClubRoleContract;
// use App\Repositories\Club\ClubRoleRepository;
// use App\Contracts\Club\ClubContract;
// use App\Repositories\Club\ClubRepository;
// use App\Contracts\Club\ClubQuestionnaireContract;
// use App\Repositories\Club\ClubQuestionnaireRepository;
// use App\Contracts\Club\ClubRecruitmentFormContract;
// use App\Repositories\Club\ClubRecruitmentFormRepository;
// use App\Contracts\Club\ClubJoiningRequestContract;
// use App\Repositories\Club\ClubJoiningRequestRepository;
// use App\Contracts\Club\ClubMemberContract;
// use App\Repositories\Club\ClubMemberRepository;
// use App\Contracts\Search\SearchContract;
// use App\Repositories\Search\SearchRepository;
// use App\Contracts\Club\ClubEventContract;
// use App\Repositories\Club\ClubEventRepository;
// use App\Contracts\QuickAccess\QuickAccessContract;
// use App\Repositories\QuickAccess\QuickAccessRepository;
// use App\Contracts\GroupFinder\GroupFinderEventContract;
// use App\Repositories\GroupFinder\GroupFinderEventRepository;
// use App\Contracts\Setting\SettingContract;
// use App\Repositories\Setting\SettingRepository;
// use App\Contracts\Translation\TranslationContract;
// use App\Repositories\Translation\TranslationRepository;
// use App\Contracts\Event\EventContract;
// use App\Repositories\Event\EventRepository;
// use App\Contracts\Event\EventQuestionnaireContract;
// use App\Repositories\Event\EventQuestionnaireRepository;
// use App\Contracts\Event\EventReportFormContract;
// use App\Repositories\Event\EventReportFormRepository;
// use App\Contracts\Event\EventReportContract;
// use App\Repositories\Event\EventReportRepository;
// use App\Contracts\Event\EventMemberContract;
// use App\Repositories\Event\EventMemberRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        UserContract::class => UserRepository::class,
        PostContract::class => PostRepository::class,
        // AuthContract::class => AuthRepository::class,
        // AccountContract::class => AccountRepository::class,
        // SocialContract::class => SocialRepository::class,
        // LocationContract::class => LocationRepository::class,
        // TimezoneContract::class => TimezoneRepository::class,
        // GameContract::class => GameRepository::class,
        // PlatformContract::class => PlatformRepository::class,
        // GameRankContract::class => GameRankRepository::class,
        // ClubContract::class => ClubRepository::class,
        // ClubQuestionnaireContract::class => ClubQuestionnaireRepository::class,
        // ClubRecruitmentFormContract::class => ClubRecruitmentFormRepository::class,
        // ClubJoiningRequestContract::class => ClubJoiningRequestRepository::class,
        // ClubMemberContract::class => ClubMemberRepository::class,
        // ClubRoleContract::class => ClubRoleRepository::class,
        // SearchContract::class => SearchRepository::class,
        // ClubEventContract::class => ClubEventRepository::class,
        // QuickAccessContract::class => QuickAccessRepository::class,
        // GroupFinderEventContract::class => GroupFinderEventRepository::class,
        // SettingContract::class => SettingRepository::class,
        // TranslationContract::class => TranslationRepository::class,
        // EventContract::class => EventRepository::class,
        // EventQuestionnaireContract::class => EventQuestionnaireRepository::class,
        // EventReportFormContract::class => EventReportFormRepository::class,
        // EventReportContract::class => EventReportRepository::class,
        // EventMemberContract::class => EventMemberRepository::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
