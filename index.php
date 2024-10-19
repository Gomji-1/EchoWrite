<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Text to MP3 Converter</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to the CSS file -->
</head>
<body>
    <h2>Convert Text to MP3</h2>
    <form method="post" action="">
        <textarea name="text" placeholder="Enter text to convert" required></textarea><br>
        <button type="submit" name="convert">Convert to MP3</button>
    </form>

    <?php
    // Increase the maximum execution time to 300 seconds (5 minutes)
    set_time_limit(300);

    if (isset($_POST['convert'])) {
        $text = $_POST['text'];
        $output_mp3 = "output.mp3";  // The name of the MP3 file that will be generated.

        // Escape the text to make it safe for the command line.
        $escaped_text = escapeshellarg($text);

        // Run the Python script.
        $command = "python text_to_mp3.py $escaped_text $output_mp3";
        $output = shell_exec($command);

        // Check if the MP3 file was created and provide a download link.
        if (file_exists($output_mp3)) {
            echo "<p>MP3 file generated: <a href='$output_mp3' download>Download MP3</a></p>";
        } else {
            echo "<p>An error occurred while generating the MP3 file.</p>";
        }
    }
    ?>
</body>
</html>
