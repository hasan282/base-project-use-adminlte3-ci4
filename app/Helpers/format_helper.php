<?php

if (!function_exists('nformat')) {
    /** Format Angka dengan Separator
     * @param string|int|float $number Value
     * @param int $decimal Jumlah Angka dibelakang Koma
     * @param bool $reverse Kebalikan dari Format Internasional
     * @return string Angka yang diformat
     */
    function nformat($number, int $decimal = 2, bool $reverse = true)
    {
        $result = null;
        if (!is_array($number) && !is_object($number)) {
            $separator = array(',', '.');
            if ($reverse) $separator = array('.', ',');
            $result = number_format(floatval($number), $decimal, $separator[1], $separator[0]);
        }
        return $result;
    }
}

if (!function_exists('unformat')) {
    function unformat($number, string $separator = '.', string $decimal = ',')
    {
        $result = null;
        if (is_string($number) && $number !== null) {
            $numb = str_replace($separator, '', $number);
            $numb = str_replace($decimal, '.', $numb);
            if (preg_match('/^[0-9.]+$/i', $numb)) $result = $numb;
        }
        return $result;
    }
}

if (!function_exists('create_id')) {
    /** Format ID YYMMDDHHIISS (Length 12) ditambah Suffix Angka Random
     * @param int $suffix Length angka random
     * @return string ID yang dihasilkan.
     */
    function create_id(int $suffix = 4)
    {
        $suffix_value = '';
        if ($suffix > 0) {
            if ($suffix === 1) {
                $suffix_value .= mt_rand(0, 9);
            } else {
                $min = str_pad('1', $suffix, '0');
                $max = str_pad('9', $suffix, '9');
                $suffix_value .= mt_rand(intval($min), intval($max));
            }
        }
        return date('ymdHis') . $suffix_value;
    }
}

if (!function_exists('fdate')) {
    /**
     * @param string $date Tanggal dengan format YYYY-MM-DD
     * @param string $format Format Tanggal Output, 
     * DD1 -> 1, DD2 -> 01, 
     * MM1 -> 02, MM2 -> Feb, MM3 -> Februari, 
     * YY1 -> 22, YY2 ->2022
     * @return string|null null jika format tidak tepat
     */
    function fdate($date, $format = 'DD2 MM3 YY2')
    {
        /* Format Date ex. 2022-02-01
    DD1 => 1 , DD2 => 01
    MM1 => 02 , MM2 => Feb , MM3 => Februari
    YY1 => 22 , YY2 =>2022
    */
        $result_date = null;
        $mnt_list = explode(',', 'Jan,Feb,Mar,Apr,Mei,Jun,Jul,Ags,Sep,Okt,Nov,Des');
        $month_list = explode(',', 'Januari,Februari,Maret,April,Mei,Juni,Juli,Agustus,September,Oktober,November,Desember');
        $date_vals = explode('-', $date);
        if (sizeof($date_vals) === 3) {
            $day = $date_vals[2];
            $month = $date_vals[1];
            $year = $date_vals[0];
            $format_code = array('DD1', 'DD2', 'MM1', 'MM2', 'MM3', 'YY1', 'YY2');
            $format_date = array(
                (string) intval($day), // DD1
                $day, // DD2
                $month, // MM1
                $mnt_list[intval($month) - 1], // MM2
                $month_list[intval($month) - 1], // MM3
                substr($year, -2), // YY1
                $year // YY2
            );
            $result_date = str_replace($format_code, $format_date, $format);
        }
        return $result_date;
    }
}

if (!function_exists('id2date')) {
}
