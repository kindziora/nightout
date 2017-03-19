### Structure

* users
* locations
* events

#### relations 

* provider[of type user]
    * locations
        * events
            * consumer[of type user]

#### in words

* A user of type "provider" can add n locations and to every location he can add n events
* A user of type "consumer" can sign In to events--
* A user of type "validator" can read the qrCode of a "consumer" and process a checkin
* A checkin is the process of attending to an event and requesting your promotion

