<?php
class Scrambler
{
    private $moves = [];
    private $dirs = [];
    private $slen;
    private $cube;

    function __construct($cube)
    {
        $this->cube = $cube;

        switch ($this->cube) {
            case '222':
                // Add code for 2x2x2 cube
                $this->slen = rand(7, 10);
                $this->dirs = ["", "'", "2"];
                $this->moves = ["U", "D", "F", "B", "R", "L"];
                break;

            case '444':
                // Add code for 4x4x4 cube
                $this->slen = rand(30, 40);
                $this->dirs = ["", "'", "2"];
                $this->moves = ["U", "D", "F", "B", "R", "L", "Uw", "Dw", "Fw", "Bw", "Rw", "Lw"];
                break;

            case '555':
                // Add code for 5x5x5 cube
                $this->slen = rand(40, 50);
                $this->dirs = ["", "'", "2"];
                $this->moves = ["U", "D", "F", "B", "R", "L", "Uw", "Dw", "Fw", "Bw", "Rw", "Lw"];
                break;

            case '666':
                // Add code for 6x6x6 cube
                $this->slen = rand(50, 60);
                $this->dirs = ["", "'", "2"];
                $this->moves = ["U", "D", "F", "B", "R", "L", "Uw", "Dw", "Fw", "Bw", "Rw", "Lw", "3Uw", "3Dw", "3Fw", "3Bw", "3Rw", "3Lw"];
                break;

            case '777':
                // Add code for 7x7x7 cube
                $this->slen = rand(60, 70);
                $this->dirs = ["", "'", "2"];
                $this->moves = ["U", "D", "F", "B", "R", "L", "Uw", "Dw", "Fw", "Bw", "Rw", "Lw", "3Uw", "3Dw", "3Fw", "3Bw", "3Rw", "3Lw"];
                break;

            /*case 'pyra':
                // Add code for Pyraminx
                $this->slen = rand(10, 15);
                $this->dirs = ["", "'"];
                $this->moves = ["U", "L", "R", "B","u", "l", "r", "b"];
                break;

            case 'mega':
                // Add code for Megaminx
                $this->slen = rand(70, 80);
                $this->dirs = ["", "'","++","--"];
                $this->moves = ["U", "R", "D"];
                break;

            case 'square-1':
                // Add code for Square-1
                $this->slen = rand(15, 20);
                break;

            case 'skweb':
                // Add code for Skewb
                $this->slen = rand(10, 15);
                break;

            case 'clock':
                // Add code for Rubik's Clock
                $this->slen = rand(10, 15);
                break;*/

            default: // 333 (Rubik's Cube)
                $this->slen = rand(25, 28);
                $this->dirs = ["", "'", "2"];
                $this->moves = ["U", "D", "F", "B", "R", "L"];
                break;
        }
    }

    function gen_scramble()
    {
        $s = $this->valid(array_map(function () {
            $auxMove = array_rand($this->moves);
            $auxDirection =array_rand($this->dirs);
            return [$auxMove, $auxDirection];
        }, range(1, $this->slen)));

        $scrambleStr = '';
        foreach ($s as $move) {
            $scrambleStr .= $this->moves[$move[0]] . $this->dirs[$move[1]] . ' ';
        }

        return $scrambleStr . "[" . $this->slen . "]";
    }

    function valid($ar)
    {
        for ($x = 1; $x < count($ar); $x++) {
            while ($ar[$x][0] == $ar[$x - 1][0]) {
                $ar[$x][0] = array_rand($this->moves);
            }
        }
        for ($x = 2; $x < count($ar); $x++) {
            while ($ar[$x][0] == $ar[$x - 2][0] || $ar[$x][0] == $ar[$x - 1][0]) {
                $ar[$x][0] = array_rand($this->moves);
            }
        }

        return $ar;
    }
}
?>
