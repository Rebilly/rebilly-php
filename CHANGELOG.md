# @rebilly/client-php

## 3.1.4

### Patch Changes

- fix(api-definitions): Fix some of the inconsistencies of Plan API-defs Rebilly/rebilly#8670
- feat(be): Add 3DS support to Rapyd Rebilly/rebilly#8067
- SDK Generator updated
- fix(be,api-definitions): Fix payout requests datetime format issues Rebilly/rebilly#8923
- SDK Generator updated
- feat(be): Add payout via Monolo Rebilly/rebilly#8128
- SDK Generator updated
- build(deps): merge passing FE dependabot PRs Rebilly/rebilly#7937
- feat(api-definitions): Add customFields property to StorefrontPurchase schema Rebilly/rebilly#7908
- SDK Generator updated
- fix(api-definitions): Fix lint errors Rebilly/rebilly#8540
- feat(be): Tampered KYC document detection Rebilly/rebilly#7876
- feat(be): Add Samsung Pay feature to RTP and GatewayAccount Rebilly/rebilly#7971
- feat(api-definitions): Add quantity filled limit reached event and webhook Rebilly/rebilly#8095
- SDK Generator updated
- build(deps): merge passing FE dependabot PRs Rebilly/rebilly#8656
- refactor(api-definitions,recomm): Remove trial only conversion quotes Rebilly/rebilly#8879
- feat(be): Add PayCom integration Rebilly/rebilly#9093
- revert(be): Tampered KYC document detection Rebilly/rebilly#8078
- feat(be): Add 3ds support to Redsys Rebilly/rebilly#8234
- feat(be): Add Omnimatrix integration Rebilly/rebilly#8616
- feat(be): Add gate2way integration Rebilly/rebilly#7887
- build(deps): merge passing FE dependabot PRs Rebilly/rebilly#8178
- feat(be): Integrate JetonCash Rebilly/rebilly#8391
- fix(api-definitions): Add missing locale in Customer.yaml Rebilly/rebilly#8662
- feat(api-definitions): Add parameter to PostTransactionRefund Rebilly/rebilly#9180
- docs: Fix the typo Rebilly/rebilly#8981
- fix(api): Fix missing gate2way mapping Rebilly/rebilly#8029
- feat(api-definitions): Remove TestSandbox3dsServer from supported 3ds servers Rebilly/rebilly#8718
- SDK Generator updated
- feat(be): Add support for Samsung Pay digital wallet Rebilly/rebilly#7760
- build(deps): merge passing FE dependabot PRs Rebilly/rebilly#8272
- fix(api): Add expand param to Deposit requests collection request Rebilly/rebilly#8841
- feat(be): Buckaroo sepa Rebilly/rebilly#8620
- feat(be): Add 3DS support to Paysafe Rebilly/rebilly#8434
- feat(api-definitions, backend): Add JWT to DepositRequest response Rebilly/rebilly#8345
- docs(api-definitions): Add link to deposit URL field Rebilly/rebilly#8290
- fix(api-definitions): Add missing createdTime and updatedTime to Quote schema Rebilly/rebilly#8374

## 3.1.3

### Patch Changes

- Add orderDelinquencyPeriod to Organization settings Rebilly/rebilly#7016
- Update Conekta OXXO URL Rebilly/rebilly#7396
- Remove pricing from TrialOnlyPlan Rebilly/rebilly#7665
- Add IPN signature support to Chillstock Rebilly/rebilly#7615
- Add trial ended event to order and customer timelines Rebilly/rebilly#7148
- Add ignoreRecurring for change items Rebilly/rebilly#7433
- Add new website payment form setting hideZeroAmountSummaryItems Rebilly/rebilly#7462

## 3.1.2

### Patch Changes

- Add Monolo payment integration Rebilly/rebilly#6870
- Mark Worldpay dispute as representment Rebilly/rebilly#7022
- Add device ID to Mercadopago Rebilly/rebilly#6313
- Fix api errors in risk-score-simualtion-jobs Rebilly/rebilly#5709
- Add PostReadyToPayFactory Rebilly/rebilly#5745
- Add matchLevel to KycDocument Rebilly/rebilly#6027
- Add UI version to KYC settings Rebilly/rebilly#5890
- Remove orderId from Subscription and OneTimeSale Rebilly/rebilly#6331
- Add expand to KYC request get Rebilly/rebilly#6306
- Add optional credentials to Buckaroo Rebilly/api-definitions#1884
- Remove unused models
- Add SecureTrading recurring settings Rebilly/api-definitions#1889
- Update MobilePay credentials Rebilly/api-definitions#1883
- Add basic KYC matchLevel Rebilly/rebilly#5975
- Add "release" version attribute to Status API response Rebilly/rebilly#1883
- Add PostPaymentInstrumentNameInquiry endpoint Rebilly/rebilly#6399
- Fix handling redirect responses Rebilly/rebilly-php#708
- Add new factors to RiskScoreRules Rebilly/api-definitions#1881
- Add transaction-processed to the list of supported tag/untag rules Rebilly/api-definitions#1871
- Add Unlimit gateway adapter Rebilly/api-definitions#1873
- Risk score simulation configuration Rebilly/rebilly#5613
- Add missing cancel category entries Rebilly/rebilly#6146
- Add quote-accepted event to order timeline Rebilly/rebilly#7076
- Add currencyAccountIds credential field to Skrill gateway Rebilly/rebilly#6310
- Remove Buckaroo debtor code Rebilly/rebilly#5772
- Add abandon-scheduled-payments rule action Rebilly/api-definitions#1875
- Add hasCompletedFaceLiveness property to KycIdentityMatches schema Rebilly/rebilly#6777
- Add disputes resource to Data Exports Rebilly/rebilly#6175
- Add autopay to trial only conversion quote Rebilly/rebilly#5685
- Fix ReportsAPI::getDashboardMetrics and ReportsAPI::getRevenueWaterfall return types
- Add PayU gateway account Rebilly/rebilly#5250
- Fix incorrect links. Rebilly/rebilly#6415
- Remove isBot risk factor field Rebilly/api-definitions#1882

## 3.1.1

### Patch Changes

- Move JsonSerializable down to interfaces
- Add isAdBlockEnabled to RiskMetadata.browserData Rebilly/api-definitions#1848
- Add jsonSerialization for non-scalar collections Rebilly/rebilly-php#675

## 3.1.0

### Minor Changes

- Add support for \_embedded
- Remove CoreService and UserService, introduce single Service to handle all APIs
- Add support for string -> float and string -> DateTimeImmutable castings (including within the array)
- Fix mixed model classes due to related shema definitions

### Patch Changes

- Add depositRequestId to Transaction response Rebilly/api-definitions#1762
- Fix GatewayAccount PUT SDK operation name Rebilly/api-definitions#1845
- Add subscription billingPortalToken Rebilly/api-definitions#1834
- Add paypal-claim dispute type Rebilly/api-definitions#1825
- Add round amount after DCC to gateway account setting Rebilly/api-definitions#1714
- Add pricing min quantity
- Add interimOnly for ChangeQuote Rebilly/api-definitions#1819
- Billing Portal cleanup Rebilly/api-definitions#1813
- Add orderId to invoice Rebilly/api-definitions#1807
- Add expand to param to StorefrontGetExperimentalBillingPortal Rebilly/api-definitions#1803
- Add quote for change items/reactivate order Rebilly/api-definitions#1784
- Allow negative risk score rule values Rebilly/api-definitions#1865
- Migrate rich billing portals to common billing portals Rebilly/api-definitions#1796
- Add riskMetadata field Rebilly/api-definitions#1860
- Add StorefrontPostSubscriptionReactivation Rebilly/api-definitions#1830
- Set up catalog with permalinks and replace products bundler Rebilly/api-definitions#1667
- Rename risk metadata vpnServiceName to hostingName Rebilly/api-definitions#1724
- Add Restrict to customer coupon restriction type
- Add Storefront update usage limits Rebilly/api-definitions#1775
- Remove build command Rebilly/api-definitions#1792
- Fix billing portal id prefix Rebilly/api-definitions#1805
- Add payout-request-canceled webhook Rebilly/api-definitions#1806
- Add Invoice delinquencyTime Rebilly/api-definitions#1746
- Rename Storefront tags Rebilly/api-definitions#1738
- Rename orderId to subscriptionId in quotes Rebilly/api-definitions#1856
- Remove unused upcoming invoice fields Rebilly/api-definitions#1823
- Add missing security for Storefront operations Rebilly/api-definitions#1740
- Add missing Application.logoId type Rebilly/api-definitions#1698
- Rename Storefront POST Order to Subscriptions Rebilly/api-definitions#1777
- Add orderId to Subscription and OneTimeSale yaml files Rebilly/api-definitions#1849
- Add faceLivenessRequired Rebilly/api-definitions#1774
- Make Plan.id readOnly Rebilly/api-definitions#1651
- Make WebhookCredential type readonly Rebilly/api-definitions#1832
- Add quantityFilled and its update Rebilly/api-definitions#1754
- Add Klarna payNowStandalone to settings Rebilly/api-definitions#1718
- Add detail to default instrument description Rebilly/api-definitions#1846
- Add setting to CoinGate to adjust amount Rebilly/api-definitions#1822
- Update subscription/one-time-sale prefix examples Rebilly/api-definitions#1863
- Add PostPayoutRequestCancellation operation Rebilly/api-definitions#1798
- Update description for authorize-and-void setup instruction Rebilly/api-definitions#1790
- Add amount limits to deposit request Rebilly/api-definitions#1666
- Add isTrialConverted field to subscription Rebilly/api-definitions#1795
- Fix dispute schema Rebilly/api-definitions#1716
- Make cashier request fields nullable Rebilly/api-definitions#1654
- Add KYC links to Storefront transaction Rebilly/api-definitions#1850
- Add readyToPayoutInstruction property Rebilly/api-definitions#1707
- Add usage limits events Rebilly/api-definitions#1701
- Add payoutRequestId to Transaction Rebilly/api-definitions#1768
- Add BVNK gateway config Rebilly/api-definitions#1857
- Add default values for cashier request Rebilly/api-definitions#1656
- Add source to dispute Rebilly/api-definitions#1816
- Adjust SubscriptionChange items-quantity Rebilly/api-definitions#1829
- Add deposit-request transactionIds Rebilly/api-definitions#1772
- Rename Quote embedded order to subscription Rebilly/api-definitions#1862
- Add usage settings for ChangeQuote Rebilly/api-definitions#1840
- Remove Subscription from upcoming invoice Rebilly/api-definitions#1781
- Add dispute credentials for PSiGate
- Add field to RiskMetadata.extraData Rebilly/api-definitions#1858
- Extract multiple times duplicated data export recurring value object Rebilly/api-definitions#1828
- Add expand parameter to Storefront invoices Rebilly/api-definitions#1770
- Add Restrict to exclusive application coupon restriction type Rebilly/api-definitions#1639
- Fis Storefront get order expand Rebilly/api-definitions#1785
- Add PO box to StorefrontPurchase Rebilly/api-definitions#1743
- Remove Worldpay enableStoredCredentials in favour of enforceStoredCredentails Rebilly/api-definitions#1747
- Add autopay to quotes Rebilly/api-definitions#1814
- Add autopay to Storefront Order PATCH Rebilly/api-definitions#1804
- Fix DepositRequest.customAmount description Rebilly/api-definitions#1664
- Fix Plan periodAnchorInstruction Rebilly/api-definitions#1759
- Add 409 response KYC verification finish endpoint Rebilly/api-definitions#1867
- Flatten plan related schemas Rebilly/api-definitions#1838
- Add and to StorefrontTransaction Rebilly/api-definitions#1745
- Add delinquencyPeriod property to Subscription resource Rebilly/api-definitions#1722
- Remove BaseKycDocument schema Rebilly/api-definitions#1658
- Add usage limits configuration to the change items operation Rebilly/api-definitions#1706
- Fix broken links Rebilly/api-definitions#1787
- Add attempted deposit-request status Rebilly/api-definitions#1771
- Update orderId description Rebilly/api-definitions#1853
- Simplify service credential Rebilly/api-definitions#1831
- Add subscription-items-changed event Rebilly/api-definitions#1794
- Add setting and credentials to Awepay Rebilly/api-definitions#1719
- Add LaCore integration Rebilly/api-definitions#1851
- Add deposit-request customFields Rebilly/api-definitions#1841
- Allow resetTime to be null Rebilly/api-definitions#1696
- Add Trial conversion quote in Storefront change order items Rebilly/api-definitions#1820
- Add method to payout request allocation Rebilly/api-definitions#1833
- Update score description Rebilly/api-definitions#1749
- Add parameters to GetEventCollection Rebilly/api-definitions#1835
- Add customerDocumentCustomField setting to dLocal
- Add PayRedeem gateway config
- Add query collection parameter to GetEventCollection Rebilly/api-definitions#1837
- Rename cashier to deposit Rebilly/api-definitions#1661
- Add Storefront Order expand Rebilly/api-definitions#1782
- Update subscription/one-time-sale prefix examples Rebilly/api-definitions#1824
- Add rich billing portal Rebilly/api-definitions#1686
- Improve type hints for API classes
- Add payout settings to BVNK Rebilly/api-definitions#1861
- Add three3dsIO to Airwallex Rebilly/api-definitions#1647
- Remove deprecated fileId property from KycDocument Rebilly/api-definitions#1662
- Add Storefront change-items endpoint Rebilly/api-definitions#1769
- Add churnTimePolicy to subscription cancellation Rebilly/api-definitions#1839
- Add quote taxes Rebilly/api-definitions#1635
- Add Ready To Payout operations Rebilly/api-definitions#1649
- Add expand parameter PostSubscriptionItemsChange Rebilly/api-definitions#1800
- Add usage limit configuration Rebilly/api-definitions#1650
- Update references and readme Rebilly/api-definitions#1731
- Add enforceStoredCredentials setting for Worldpay Rebilly/api-definitions#1741
- Make \_links of plan schemas read only Rebilly/api-definitions#1744
- Add meteredBilling field to StorefrontPlan Rebilly/api-definitions#1815
- add new status to deposit request Rebilly/api-definitions#1765
- Add dispute type Rebilly/api-definitions#1646
- Add Checkout.com processing channel ID Rebilly/api-definitions#1687
- Add quote for change items/reactivate order Rebilly/api-definitions#1727
- Add expand param to Storefront rich billing portals Rebilly/api-definitions#1779
- Add specification for UpcomingInvoice Rebilly/api-definitions#1748
- Rename subscription yaml files Rebilly/api-definitions#1735
- Fix UpcomingInvoice \_links Rebilly/api-definitions#1753
- Add SecureTrading notificationPassword credential Rebilly/api-definitions#1632
- Rename Subscription endTime to churnTime Rebilly/api-definitions#1836
- Add depositRequestId to storefront transaction Rebilly/api-definitions#1767
- Add detail to face liveness description Rebilly/api-definitions#1776
- Remove invalid property from declined report Rebilly/api-definitions#1712
- Add gateway object to StorefrontTransaction Rebilly/api-definitions#1736
- Add address-based and refactor AML confidence settings Rebilly/api-definitions#1697
- Allow clearing sticky gateway from payment instrument by sending value Rebilly/api-definitions#1786
- Add sftpKeyPassphrase to Truevo Rebilly/api-definitions#1733
- Add example for regex pattern properties Rebilly/api-definitions#1720
- Update patch subscription item status code Rebilly/api-definitions#1854
- Update outdated subscription code examples Rebilly/api-definitions#1742
- Update notificationUrl descriptions Rebilly/api-definitions#1764
- Add Quote webhooks Rebilly/api-definitions#1802
- Add quote item id to preview items (Rebilly/api-definitions#1630)
- Add acceptance conditions to quotes Rebilly/api-definitions#1760
- Refactor subscriptions related files Rebilly/api-definitions#1734
- Add quote events to customer timeline
