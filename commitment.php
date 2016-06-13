<?php
// commitment.php
$buzz_adverbs = ["probably", "almost", "nearly", "actually", "quickly", "suddenly"];
$buzz_adjectives = ["admin", "ldap", "", "all", "additional", "more", "new",
	"extra"];
$buzz_verbs = ["added", "implemented", "redesigned", "developed", "fixed",
	"updated", "refactored"];
$buzz_nouns = ["portal", "buttons", "button", "page", "service", "api calls",
	"class", "function", "view"];

function generate_arjun_commit_name() {
    global $buzz_adverbs;
    global $buzz_adjectives;
    global $buzz_verbs;
    global $buzz_nouns;

    $verb = $buzz_verbs[mt_rand(0, sizeof($buzz_verbs) - 1)];
    $noun = $buzz_nouns[mt_rand(0, sizeof($buzz_nouns) - 1)];
    $adjective = $buzz_adjectives[mt_rand(0, sizeof($buzz_adjectives) - 1)];

	if (mt_rand(0, 5) == 1) {
    	$adverb = $buzz_adverbs[mt_rand(0, sizeof($buzz_adverbs) - 1)];
	}

	if ($adverb) $verb = $adverb . " " . $verb;
	if ($adjective) $noun = $adjective . " " . $noun;

	$result = $verb . ' ' . $noun;

	if (mt_rand(0, 1)) {
		$other_noun = $buzz_nouns[mt_rand(0, sizeof($buzz_nouns) - 1)];
		$other_adjective = $buzz_adjectives[mt_rand(0, sizeof($buzz_adjectives) - 1)];
		$result .= " and " . $other_adjective . " " . $other_noun;
	}

    // Remove any doubled-up spaces
	for ($i = 0; $i < strlen($result); $i++) {
		if ($result[$i] == ' ' && $result[$i + 1] == ' ') {
			$result[$i] = '';
		}
	}

    return $result;
}

if (!isset($argv[1])) {
	$argv[1] = 1;
}

for ($i = 0; $i < $argv[1]; $i++) {
	echo generate_arjun_commit_name() . PHP_EOL;
}
