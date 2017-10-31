if ( ! function_exists('getFactorial'))
{

    function generateNumber() {
        $number = mt_rand(1000000, 9999999); // better than rand()


        if (numberExists($number)) {
            return generateNumber();
        }
        return $number;
    }

    function numberExists($number) {
        return User::whereBarcodeNumber($number)->exists();
    }
}