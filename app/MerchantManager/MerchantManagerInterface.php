<?php 

namespace App\MerchantManger;

interface MerchantMangerInterface 
{
	public $account;

	/**
	* Construct the Account 
	* 
	* @param Merchant Key
	*
	**/

	public function setAccountEnviorment($merchantKey);

	// Account Profile Managing

	/**
	*
	* Get the Merchant Account Object 
	*
	* @param array $keys
	*
	**/

	public function retrieveMerchantAccount(array $keys);

	/**
	*
	* Create a Merchant Account 
	*
	* @param array $options
	*
	**/

	public function createMerchantAccount(array $options);

	/**
	*
	* Update a Merchant Account Entities
	*
	* @param array $enties
	*
	**/
	// Would I do Stripe $account? 

	public function updateMerchantAccount(array $entities);

	/**
	*
	* Delete a Merchant Account
	*
	**/

	public function deleteMerchantAccount();

	/**
	*
	* Reject a Merchant Account
	*
	* @param array $reason
	**/

	public function rejectMerchantAccount(array $reason);

	// Account Application Fees

	/**
	*
	* Create Appication fee
	*
	* @param array application
	*
	**/

	public function createApplicationFee(array $application);

	/**
	*
	* Get Application Fee
	*
	* @param array $charge 
	*
	**/

	public function getApplicationFee(array $charge);

	/**
	*
	* Create Application Refund 
	*
	* @param $fee STRING
	*
	**/

	public function createApplicationFeeRefund($fee);

	/**
	*
	* Get Applicaiton Fee Refund Status
	*
	* @param array $refundedApplication
	*
	*/

	public function getApplicationFeeRefundStatus(array $refundedApplication);

	/**
	*
	* Update a Application Refund 
	*
	* @param array $options
	* @param array $refundedAppication
	*
	**/

	public function updateApplicationFeeRedfund(array $options, array $refundedApplication);

	// Payment Information

	/**
	*
	* Create a bank account for a managed account
	*
	* @param $bankToken
	*
	**/

	public function createMerchantBankAccountSource($bankToken);

	/**
	*
	* Retrieve a Mercahants Bank Account
	*
	* @param $bankId
	*
	**/

	public function retrieveMerchantBankAccount($bankId);

	/**
	*
	* Update Merchant Bank Account
	*
	* @param array $options
	* @param $bankId
	*
	**/

	public function updateMerchantBankAccount($bankId, array $options);

	/**
	*
	* Delete Merchant Bank Account
	*
	* @param $bankId
	*
	**/

	public function deleteMerchantBankAccount($bankId);

	/**
	*
	* List Merchants Bank Accounts
	*
	* @param array $options 
	*
	**/

	public function listMerchantBankAccounts(array $options);

	/**
	*
	* Create a Merchant Card
	*
	* @param $card
	* @param $default BOOL
	*
	**/

	public function createMerchantCardSource($card, $default);

	/**
	*
	* Get a Merchant Card
	*
	* @param $card
	*
	**/

	public function getMerchantsCard($card);

	/**
	*
	* Update Merchants Card
	*
	* @param $card
	* @param array $options
	*
	**/

	public function updateMerchantCardSource($card, $options);

	/**
	*
	* Delete Merchants Card
	*
	* @param $card
	*
	**/

	public function deleteMerchantCardSource($card);

	/**
	*
	* List all Cards
	*
	* @param array $options
	*
	**/

	public function listAllMerchantCardSources(array $options);

}