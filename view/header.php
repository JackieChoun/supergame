<?php
class ViewHeader{
    public function displayView(): string
    {
        return ("
        <!DOCTYPE html>
        <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Document</title>
            </head>
                <body>
                <header>
                    <h1>SuperGame</h1>
                    <nav>
                        <ul>
                            <li><a href='index.php'>Inscription</a></li>
                        </ul>
                    </nav>
                </header>
            ");
    }
}
?>
    
    
