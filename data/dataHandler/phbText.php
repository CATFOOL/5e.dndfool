<?php
$dataPath = $_SERVER['DOCUMENT_ROOT'] . "/data/";
$phbPath = $dataPath . "book/phb/";


# Chapter 7: Ability Scores
$outputPath = $dataPath . "abilities/";
$cp7 = file_get_contents($phbPath . "Part 2：进行游戏 Playing the Game\第7章：属性值应用 Using Ability Scores.md");

# Ability Scores
$abilities = ["力量 Strength", "敏捷 Dexterity", "体质 Constitution", "智力 Intelligence", "感知 Wisdom", "魅力 Charisma"];
for ($i = 0; $i < count($abilities); $i++) {
    if ($i+1 < count($abilities)){
        $abilityText = ExtractMD($cp7, "### " . $abilities[$i], "### " . $abilities[$i+1]);
    }
    else{
        $abilityText = ExtractMD($cp7, "### " . $abilities[$i], "## 豁免检定 Saving Throws");
    }
    $outputTitle = explode(" ", $abilities[$i])[1];
    $outputTitle = strtolower($outputTitle);
    WriteMD($abilityText, $outputPath . $outputTitle . ".md");
}

# Proficiency Bonus
$pbText = ExtractMD($cp7, "## 熟练加值 Proficiency Bonus", "## 属性检定 Ability Checks");
WriteMD($pbText, $outputPath . "proficiencyBonus.md");

# Saving Throws
$stText = ExtractMD($cp7, "## 豁免检定 Saving Throws", null);
WriteMD($stText, $outputPath . "savingThrows.md");


function ExtractMD($text, $title, $nextTitle): string
{
    $text = explode($title, $text)[1];
    if ($nextTitle != null){
        $text = explode($nextTitle, $text)[0];
    }
    $text = $title . $text;
    return trim($text, "\n") . "\n\n";
}

function WriteMD($text, $path): void
{
    $file = fopen($path, "w");
    fwrite($file, $text);
    fclose($file);
}

