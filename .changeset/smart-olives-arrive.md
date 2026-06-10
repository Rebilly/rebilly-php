---
"@rebilly/client-php": minor
---

### Added

- Added optional response property `canceledTime` on `Subscription` — `GET /search`, `GET /subscriptions` + 5 more
- Added optional response property `contentBlock` — `GET /account-registration-settings`, `POST /account-registration-settings` + 2 more
- Added optional request property `contentBlock` — `POST /account-registration-settings`, `PUT /account-registration-settings/{id}`
- Added optional response property `inputType` — `GET /account-registration-settings`, `POST /account-registration-settings` + 2 more
- Added optional request property `inputType` — `POST /account-registration-settings`, `PUT /account-registration-settings/{id}`
- Added optional response property `minimumAge` — `GET /account-registration-settings`, `POST /account-registration-settings` + 2 more
- Added optional request property `minimumAge` — `POST /account-registration-settings`, `PUT /account-registration-settings/{id}`
- Added optional response property `placeholder` — `GET /account-registration-settings`, `POST /account-registration-settings` + 2 more
- Added optional request property `placeholder` — `POST /account-registration-settings`, `PUT /account-registration-settings/{id}`

### Enum changes

- Enum value added on request `attribute`: `contentBlock` — `POST /account-registration-settings`, `PUT /account-registration-settings/{id}`
- Enum value added on response `attribute`: `contentBlock` — `GET /account-registration-settings`, `POST /account-registration-settings` + 2 more
