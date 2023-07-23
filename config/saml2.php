<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Tenant Model
    |--------------------------------------------------------------------------
    |
    | This will allow you to override the tenant model with your own.
    |
    */

    'tenantModel' => \Slides\Saml2\Models\Tenant::class,

    /*
    |--------------------------------------------------------------------------
    | Use built-in routes
    |--------------------------------------------------------------------------
    |
    | If "useRoutes" set to true, the package defines five new routes:
    |
    | Method | URI                             | Name
    | -------|---------------------------------|------------------
    | POST   | {routesPrefix}/{uuid}/acs       | saml.acs
    | GET    | {routesPrefix}/{uuid}/login     | saml.login
    | GET    | {routesPrefix}/{uuid}/logout    | saml.logout
    | GET    | {routesPrefix}/{uuid}/metadata  | saml.metadata
    | GET    | {routesPrefix}/{uuid}/sls       | saml.sls
    |
    */

    'useRoutes' => true,

    /*
    |--------------------------------------------------------------------------
    | Built-in routes prefix
    |--------------------------------------------------------------------------
    |
    | Here you may define the prefix for built-in routes.
    |
    */

    'routesPrefix' => '/saml2',

    /*
    |--------------------------------------------------------------------------
    | Middle groups to use for the SAML routes
    |--------------------------------------------------------------------------
    |
    | Note, Laravel 5.2 requires a group which includes StartSession
    |
    */

    'routesMiddleware' => [],

    /*
    |--------------------------------------------------------------------------
    | Signature validation
    |--------------------------------------------------------------------------
    |
    | Set to true if you want to use parameters from $_SERVER to validate the signature.
    |
    */

    'retrieveParametersFromServer' => false,

    /*
    |--------------------------------------------------------------------------
    | Login redirection URL.
    |--------------------------------------------------------------------------
    |
    | The redirection URL after successful login.
    |
    */

    'loginRoute' => env('SAML2_LOGIN_URL'),

    /*
    |--------------------------------------------------------------------------
    | Logout redirection URL.
    |--------------------------------------------------------------------------
    |
    | The redirection URL after successful logout.
    |
    */

    'logoutRoute' => env('SAML2_LOGOUT_URL'),


    /*
    |--------------------------------------------------------------------------
    | Login error redirection URL.
    |--------------------------------------------------------------------------
    |
    | The redirection URL after login failing.
    |
    */

    'errorRoute' => env('SAML2_ERROR_URL'),

    /*
    |--------------------------------------------------------------------------
    | Strict mode.
    |--------------------------------------------------------------------------
    |
    | If 'strict' is True, then the PHP Toolkit will reject unsigned
    | or unencrypted messages if it expects them signed or encrypted
    | Also will reject the messages if not strictly follow the SAML
    | standard: Destination, NameId, Conditions... are validated too.
    |
    */

    'strict' => true,

    /*
    |--------------------------------------------------------------------------
    | Debug mode.
    |--------------------------------------------------------------------------
    |
    | When enabled, errors must be printed.
    |
    */

    'debug' => env('SAML2_DEBUG', env('APP_DEBUG', false)),

    /*
    |--------------------------------------------------------------------------
    | Whether to use `X-Forwarded-*` headers to determine port/domain/protocol.
    |--------------------------------------------------------------------------
    |
    | If 'proxyVars' is True, then the Saml lib will trust proxy headers
    | e.g X-Forwarded-Proto / HTTP_X_FORWARDED_PROTO. This is useful if
    | your application is running behind a load balancer which terminates SSL.
    |
    */

    'proxyVars' => false,

    /*
    |--------------------------------------------------------------------------
    | Service Provider configuration.
    |--------------------------------------------------------------------------
    |
    | General setting of the service provider.
    |
    */

    'sp' => [

        /*
        |--------------------------------------------------------------------------
        | NameID format.
        |--------------------------------------------------------------------------
        |
        | Specifies constraints on the name identifier to be used to
        | represent the requested subject.
        |
        */

        'NameIDFormat' => 'urn:oasis:names:tc:SAML:2.0:nameid-format:persistent',

        /*
        |--------------------------------------------------------------------------
        | SP Certificates.
        |--------------------------------------------------------------------------
        |
        | Usually x509cert and privateKey of the SP are provided by files placed at
        | the certs folder. But we can also provide them with the following parameters.
        |
        */

        'x509cert' => 'MIIEQjCCAyqgAwIBAgIJAIVlfRDBPqJ7MA0GCSqGSIb3DQEBBQUAMHMxCzAJBgNVBAYTAnBzMQ0wCwYDVQQIEwRnYXphMQ0wCwYDVQQHEwRnYXphMQwwCgYDVQQKEwNnY2MxDDAKBgNVBAsTA2djYzEMMAoGA1UEAxMDc3NvMRwwGgYJKoZIhvcNAQkBFg1zZGFkYWhAZ292LnBzMB4XDTEyMDIwNTA3MjkxMloXDTIyMDIwNDA3MjkxMlowczELMAkGA1UEBhMCcHMxDTALBgNVBAgTBGdhemExDTALBgNVBAcTBGdhemExDDAKBgNVBAoTA2djYzEMMAoGA1UECxMDZ2NjMQwwCgYDVQQDEwNzc28xHDAaBgkqhkiG9w0BCQEWDXNkYWRhaEBnb3YucHMwggEiMA0GCSqGSIb3DQEBAQUAA4IBDwAwggEKAoIBAQDDmfrkiMFe1uvVxrFlHYDaFREoYnf+vdpbuTVZFt73GEKiKEuQWO0FjxFy+duh40XmvpNc665hNhgqxkXiRD832DhkJivqG6IpBXRamoN0jJWaUwG2NPoLaRduBs8Cfs/HIlk+c52qv8vp8rk+Nn1a7vWj3txrMGxa1HZgeZaAbUzWn2p1d0YOZmPWpNWIj8rZdfHnmbZ20uLtjfJbcyJhhRyRas3PTijDSSRXkvJ+s9OkIHigvgpwj4EzC2tk+2plG3fleN3B+rjXQTE2ggrPFsZ9EAT73x29CwKLmPttkrSiLHzFSZq+AVYJ6EfTO252dy8M5v9jmIv/XI9HamdbAgMBAAGjgdgwgdUwHQYDVR0OBBYEFHHwu7mLmRl+dD2EQZRa3uC6YKdOMIGlBgNVHSMEgZ0wgZqAFHHwu7mLmRl+dD2EQZRa3uC6YKdOoXekdTBzMQswCQYDVQQGEwJwczENMAsGA1UECBMEZ2F6YTENMAsGA1UEBxMEZ2F6YTEMMAoGA1UEChMDZ2NjMQwwCgYDVQQLEwNnY2MxDDAKBgNVBAMTA3NzbzEcMBoGCSqGSIb3DQEJARYNc2RhZGFoQGdvdi5wc4IJAIVlfRDBPqJ7MAwGA1UdEwQFMAMBAf8wDQYJKoZIhvcNAQEFBQADggEBABehrOcCaXbekP4HS0mmMNS9mqnoJT0kKZlQnN3DpkiBpiXZr+ehg78rzdzcsM2mEGZdU5wCOolPfZkKWag/kwhz6HJg/9s4tc3czEoar669TzUNVxFew2DCXTvq6/zZVJ4DRjGX7+KCI8Xt0s98tQNs9YNrst/ocXtccvTUZKsG8B03MjKNvJq8oYAsOs5ee+Iir/jIvZGiQF9M8EbDfeO+B5TcvTB8zLjR88j4WXdjjohxvvpW6lS4vvvpPpEoWM9ed51+b00Ae42B5Fd7oJo/0CLD2SbDrsvVfBXAHH0a2IFPEuhg9bSWSpZOFB2CqFdOktgn/aPrJ9Ko5yg6DMw=',
        'privateKey' => 'MIIEpQIBAAKCAQEAw5n65IjBXtbr1caxZR2A2hURKGJ3/r3aW7k1WRbe9xhCoihLkFjtBY8RcvnboeNF5r6TXOuuYTYYKsZF4kQ/N9g4ZCYr6huiKQV0WpqDdIyVmlMBtjT6C2kXbgbPAn7PxyJZPnOdqr/L6fK5PjZ9Wu71o97cazBsWtR2YHmWgG1M1p9qdXdGDmZj1qTViI/K2XXx55m2dtLi7Y3yW3MiYYUckWrNz04ow0kkV5LyfrPTpCB4oL4KcI+BMwtrZPtqZRt35Xjdwfq410ExNoIKzxbGfRAE+98dvQsCi5j7bZK0oix8xUmavgFWCehH0ztudncvDOb/Y5iL/1yPR2pnWwIDAQABAoIBAB8EE5yZctAvFEZZs1dtTjlGjenxc0WZpT5WJ/dwgPp9hlNgQFsrPqpa/VFV/VW2TCdCoOtjE8umYD6oIfy3Ba89QfPfeactqpEGpGSZi663fCF0eBkEXYHhsC1qNvkWUqwo7i3Q93dT4mm+a1FKIqaArcLGW/1DOGtOtVam8Q57/2IBlpoC3ZEPO8/yrT0zAykBSN+nFrxMC+4XcdgRRV0K/b+9LpQlq0rLJPFbd0MWK1B8gZp3sFK8OEz2aTFo+PeuBhhVgkgxLs8PNVjnqwHUi0MCRoFDOgdjzHXFu9UzW2XI0dBdTON+BiEm5KPU4jGG9xV/ITv+uHqGSfTeeYECgYEA6dsxDFOy1jn2ngDqokBxrzdqZtXAmhdXt95h01qrd5vf/BqcIltKQ+aMYpTovv1PXIfGAfL2QcFDeN2vVMwLGQ+445NhFSDhtYmE0KblKjX8RFGHL4yr5gO0VRweK2XjPVlYkB0O30OH57LgdoTpafAGw/Z0vlPvzLjV/yRiYAkCgYEA1h94zDU92GE6DGhjXBRH4QC6f9A5IDsmnhkj2HZbVtwaUUV3aDfNg+Pe23dfTCzpIsvBFogbeM9O6fRuQ7tfmzhwoGH3mJmGBRJEpPFvdCuKhL43/u4S0PvOZ29s+lQrm7cV
9FBbHsjWm32Ij89d5AwG9+LbU4JblK07XgCIXUMCgYEAlBINhFiaq7oXxQOfjQxw7xiPbn15bhfJmspb9o86coln0SCoK7jR1RxtVx4iIIwTa+ssHJ/R/OB58FWtZmuruzqRPsdaeR5Qy7k/Nz31bDyydi+JATp4vTMrQ5iCIchpkba4tMcxW3xO2Q4Rwfl2MXWhUwMB+GD9PQrrtJk9EMECgYEAkQSrqZJ9mmjvCaxBbwGFVQxLQ3lg10V4eCcKsfYnEoLriBOGNZ1loWfZbcZBUrQwCZL56SqxgHbXOXiEnXbv346wKM9xA3cm35RpzVR/aax7mj/CaPQQ5l1Eg6Vhp4EOL94mDlvF+umG/7RboxqMuoCyz3xjkwF8yQsyZA30TUUCgYEA54lqm1UuujhRT7uCbSQh1/kDKDk1/SQCosg3kTkClZwfveUmPUrD///1CJqGZVawBHOiQPfCD3AOBy83Dd8D9UdOoIMLjbxkMW75EyBfwWqmcvW+6BZaBmvD7ar71DdJLPmxw050SISndj3dTUv2PWiciE//bndLMd2+Ao+gFhg=',


        /*
        |--------------------------------------------------------------------------
        | Identifier (URI) of the SP entity.
        |--------------------------------------------------------------------------
        |
        | Leave blank to use the 'saml.metadata' route.
        |
        */

        'entityId' => env('SAML2_SSO_SP_ENTITYID',''),

        /*
        |--------------------------------------------------------------------------
        | The Assertion Consumer Service (ACS) URL.
        |--------------------------------------------------------------------------
        |
        | URL Location where the <Response> from the IdP will be returned, using HTTP-POST binding.
        | Leave blank to use the 'saml.acs' route.
        |
        */

        'assertionConsumerService' => [
            'url' => '',
        ],

        /*
        |--------------------------------------------------------------------------
        | The Single Logout Service URL.
        |--------------------------------------------------------------------------
        |
        | Specifies info about where and how the <Logout Response> message MUST be
        | returned to the requester, in this case our SP.
        |
        | URL Location where the <Response> from the IdP will be returned, using HTTP-Redirect binding.
        | Leave blank to use the 'saml.sls' route.
        |
        */

        'singleLogoutService' => [
            'url' => ''
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | OneLogin security settings.
    |--------------------------------------------------------------------------
    |
    |
    |
    */

    'security' => [

        /*
        |--------------------------------------------------------------------------
        | NameId encryption
        |--------------------------------------------------------------------------
        |
        | Indicates that the nameID of the <samlp:logoutRequest> sent by this SP
        | will be encrypted.
        |
        */

        'nameIdEncrypted' => false,

        /*
        |--------------------------------------------------------------------------
        | AuthnRequest signage
        |--------------------------------------------------------------------------
        |
        | Indicates whether the <samlp:AuthnRequest> messages sent by
        | this SP will be signed. The Metadata of the SP will offer this info
        |
        */

        'authnRequestsSigned' => false,

        /*
        |--------------------------------------------------------------------------
        | Logout request signage
        |--------------------------------------------------------------------------
        |
        | Indicates whether the <samlp:logoutRequest> messages sent by this SP
        | will be signed.
        |
        */

        'logoutRequestSigned' => false,

        /*
        |--------------------------------------------------------------------------
        | Logout response signage
        |--------------------------------------------------------------------------
        |
        | Indicates whether the <samlp:logoutResponse> messages sent by this SP
        | will be signed.
        |
        */

        'logoutResponseSigned' => false,

        /*
        |--------------------------------------------------------------------------
        | Whether need to sign metadata.
        |--------------------------------------------------------------------------
        |
        | The possible values:
        | - false
        | - true (use certs)
        | - array:
        |   ```
        |   [
        |       'keyFileName' => 'metadata.key',
        |       'certFileName' => 'metadata.crt'
        |   ]
        |   ```
        |
        */

        'signMetadata' => false,

        /*
        |--------------------------------------------------------------------------
        | Requirement to sign messages.
        |--------------------------------------------------------------------------
        |
        | Indicates a requirement for the <samlp:Response>, <samlp:LogoutRequest> and
        | <samlp:LogoutResponse> elements received by this SP to be signed.
        |
        */

        'wantMessagesSigned' => false,

        /*
        |--------------------------------------------------------------------------
        | Requirement to sign assertion elements.
        |--------------------------------------------------------------------------
        |
        | Indicates a requirement for the <saml:Assertion> elements received by
        | this SP to be signed.
        |
        */

        'wantAssertionsSigned' => false,

        /*
        |--------------------------------------------------------------------------
        | Requirement to encrypt NameID.
        |--------------------------------------------------------------------------
        |
        | Indicates a requirement for the NameID received by this SP to be encrypted.
        |
        */

        'wantNameIdEncrypted' => false,

        /*
        |--------------------------------------------------------------------------
        | Authentication context.
        |--------------------------------------------------------------------------
        |
        | Set to false and no AuthContext will be sent in the AuthNRequest,
        |
        | Set true or don't present this parameter and you will get an
        | AuthContext 'exact' 'urn:oasis:names:tc:SAML:2.0:ac:classes:PasswordProtectedTransport'
        |
        | Set an array with the possible auth context values:
        | ['urn:oasis:names:tc:SAML:2.0:ac:classes:Password', 'urn:oasis:names:tc:SAML:2.0:ac:classes:X509']
        |
        */

        'requestedAuthnContext' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Contact information.
    |--------------------------------------------------------------------------
    |
    | It is recommended to supply a technical and support contacts.
    |
    */

    'contactPerson' => [
        'technical' => [
            'givenName' => env('SAML2_CONTACT_TECHNICAL_NAME', 'name'),
            'emailAddress' => env('SAML2_CONTACT_TECHNICAL_EMAIL', 'no@reply.com')
        ],
        'support' => [
            'givenName' => env('SAML2_CONTACT_SUPPORT_NAME', 'Support'),
            'emailAddress' => env('SAML2_CONTACT_SUPPORT_EMAIL', 'no@reply.com')
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Organization information.
    |--------------------------------------------------------------------------
    |
    | The info in en_US lang is recommended, add more if required.
    |
    */

    'organization' => [
        'en-US' => [
            'name' => env('SAML2_ORGANIZATION_NAME', 'Name'),
            'displayname' => env('SAML2_ORGANIZATION_NAME', 'Display Name'),
            'url' => env('SAML2_ORGANIZATION_URL', 'http://url')
        ],
    ],

];
