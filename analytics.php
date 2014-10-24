<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('setup.php');

runMainDemo($analytics);



function runMainDemo(&$analytics) {
  try {

    // Step 2. Get the user's first view (profile) ID.
    $profileId = GOOGLE_ANALYTICS_PROFILE_ID;

    if (isset($profileId)) {

      // Step 3. Query the Core Reporting API.
      $results = getResults($analytics, $profileId);

      // Step 4. Output the results.
      printResults($results);
    }

  } catch (apiServiceException $e) {
    // Error from the API.
    print 'There was an API error : ' . $e->getCode() . ' : ' . $e->getMessage();

  } catch (Exception $e) {
    print 'There was a general error : ' . $e->getMessage();
  }
}

function getResults(&$analytics, $profileId) {
   return $analytics->data_ga->get(
       'ga:' . $profileId,
       '2014-05-12',
       '2014-05-12',
       'ga:pageviews',
       array(
          'filters' => 'ga:pagePath==/2014/05/09/color-for-the-colorblind.html'
          )
       );
}

function printResults(&$results) {
  if (count($results->getRows()) > 0) {
    $profileName = $results->getProfileInfo()->getProfileName();
    $rows = $results->getRows();
    $sessions = $rows[0][0];

    print "<p>$profileName</p>";
    print "<p>Total sessions: $sessions</p>";

  } else {
    print '<p>No results found.</p>';
  }
}


?>