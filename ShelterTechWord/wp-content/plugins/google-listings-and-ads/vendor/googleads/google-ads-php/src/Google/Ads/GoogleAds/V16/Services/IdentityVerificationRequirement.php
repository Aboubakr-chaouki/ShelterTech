<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v16/services/identity_verification_service.proto

namespace Google\Ads\GoogleAds\V16\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Information regarding the verification requirement for a verification program
 * type.
 *
 * Generated from protobuf message <code>google.ads.googleads.v16.services.IdentityVerificationRequirement</code>
 */
class IdentityVerificationRequirement extends \Google\Protobuf\Internal\Message
{
    /**
     * The deadline to start verification in "yyyy-MM-dd HH:mm:ss" format.
     *
     * Generated from protobuf field <code>string verification_start_deadline_time = 1;</code>
     */
    protected $verification_start_deadline_time = '';
    /**
     * The deadline to submit verification.
     *
     * Generated from protobuf field <code>string verification_completion_deadline_time = 2;</code>
     */
    protected $verification_completion_deadline_time = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $verification_start_deadline_time
     *           The deadline to start verification in "yyyy-MM-dd HH:mm:ss" format.
     *     @type string $verification_completion_deadline_time
     *           The deadline to submit verification.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V16\Services\IdentityVerificationService::initOnce();
        parent::__construct($data);
    }

    /**
     * The deadline to start verification in "yyyy-MM-dd HH:mm:ss" format.
     *
     * Generated from protobuf field <code>string verification_start_deadline_time = 1;</code>
     * @return string
     */
    public function getVerificationStartDeadlineTime()
    {
        return $this->verification_start_deadline_time;
    }

    /**
     * The deadline to start verification in "yyyy-MM-dd HH:mm:ss" format.
     *
     * Generated from protobuf field <code>string verification_start_deadline_time = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setVerificationStartDeadlineTime($var)
    {
        GPBUtil::checkString($var, True);
        $this->verification_start_deadline_time = $var;

        return $this;
    }

    /**
     * The deadline to submit verification.
     *
     * Generated from protobuf field <code>string verification_completion_deadline_time = 2;</code>
     * @return string
     */
    public function getVerificationCompletionDeadlineTime()
    {
        return $this->verification_completion_deadline_time;
    }

    /**
     * The deadline to submit verification.
     *
     * Generated from protobuf field <code>string verification_completion_deadline_time = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setVerificationCompletionDeadlineTime($var)
    {
        GPBUtil::checkString($var, True);
        $this->verification_completion_deadline_time = $var;

        return $this;
    }

}
