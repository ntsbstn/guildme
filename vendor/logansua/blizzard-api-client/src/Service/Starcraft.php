<?php

namespace BlizzardApi\Service;

use Psr\Http\Message\ResponseInterface;

/**
 * Starcraft class
 *
 * @author Oleg Kachinsky <logansoleg@gmail.com>
 */
class Starcraft extends Service
{
    /**
     * {@inheritdoc}
     */
    protected $serviceParam = '/sc2';

    // region Profile API

    /**
     * Get profile
     *
     * This provides data about an individual SC2 profile
     *
     * @param string $id      The ID of the profile to retrieve
     * @param string $name    The name of the profile to retrieve
     * @param string $region  The region of the profile to retrieve
     * @param array  $options Options
     *
     * @return ResponseInterface
     */
    public function getProfile($id, $name, $region = '1', array $options = [])
    {
        return $this->request('/profile/'.(string) $id.'/'.(string) $region.'/'.(string) $name.'/', $options);
    }

    /**
     * Get ladders
     *
     * This provides data about an individual SC2 profile's ladders
     *
     * @param string $id      The ID of the profile to retrieve
     * @param string $name    The name of the profile to retrieve
     * @param string $region  The region of the profile to retrieve
     * @param array  $options Options
     *
     * @return ResponseInterface
     */
    public function getLadders($id, $name, $region = '1', array $options = [])
    {
        return $this->request('/profile/'.(string) $id.'/'.(string) $region.'/'.(string) $name.'/ladders', $options);
    }

    /**
     * Get match history
     *
     * This provides data about an individual SC2 profile's match history
     *
     * @param string $id      The ID of the profile to retrieve
     * @param string $name    The name of the profile to retrieve
     * @param string $region  The region of the profile to retrieve
     * @param array  $options Options
     *
     * @return ResponseInterface
     */
    public function getMatchHistory($id, $name, $region = '1', array $options = [])
    {
        return $this->request('/profile/'.(string) $id.'/'.(string) $region.'/'.(string) $name.'/matches', $options);
    }

    // endregion Profile API

    // region Ladder API

    /**
     * Get ladder
     *
     * This provides data about an SC2 ladder
     *
     * @param string $id      The ID of the ladder to retrieve.
     * @param array  $options Options
     *
     * @return ResponseInterface
     */
    public function getLadder($id, array $options = [])
    {
        return $this->request('/ladder/'.(string) $id, $options);
    }

    // endregion Ladder API

    // region Data resources API

    /**
     * Get achievements
     *
     * This provides data about the achievements available in SC2
     *
     * @param array $options Options
     *
     * @return ResponseInterface
     */
    public function getAchievements(array $options = [])
    {
        return $this->request('/data/achievements', $options);
    }

    /**
     * Get rewards
     *
     * This provides data about the rewards available in SC2
     *
     * @param array $options Options
     *
     * @return ResponseInterface
     */
    public function getRewards(array $options = [])
    {
        return $this->request('/data/rewards', $options);
    }

    // endregion Data resources API

    // region Community OAuth API

    /**
     * Get profile user
     *
     * This provides data about the current logged in OAuth user's Sc2 profile
     *
     * @param null|string $accessToken Authorized user access token
     * @param array       $options     Options
     *
     * @return ResponseInterface
     */
    public function getProfileUser($accessToken = null, array $options = [])
    {
        if (null === $accessToken) {
            $options['access_token'] = $this->blizzardClient->getAccessToken();
        } else {
            $options['access_token'] = $accessToken;
        }

        return $this->request('/profile/user', $options);
    }

    // endregion Community OAuth API
}
