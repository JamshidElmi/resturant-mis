<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
if ( ! function_exists('mds_date'))
{
    /**
     *
     * @Created by:      Jamshid Elmi
     * @modified by:     Mohammad Dayyan
     * @date:           1387/5/15
     * @param:          string
     * @return:         mixed depends on what the array contains
     */

    function mds_date($format, $when="now", $persianNumber = 0)
    {
        ///chosse your timezone
        $TZhours=0;
        $TZminute=0;
        $need="";
        $result1="";
        $result="";
        if($when=="now"){
            $year=date("Y");
            $month=date("m");
            $day=date("d");
            list( $Dyear, $Dmonth, $Dday ) = gregorian_to_mds($year, $month, $day);
            $when=mktime(date("H")+$TZhours,date("i")+$TZminute,date("s"),date("m"),date("d"),date("Y"));
        }else{
            //$when=0;
            $when+=$TZhours*3600+$TZminute*60;
            $date=date("Y-m-d",$when);
            list( $year, $month, $day ) = preg_split ( '/-/', $date );

            list( $Dyear, $Dmonth, $Dday ) = gregorian_to_mds($year, $month, $day);
            }

        $need= $when;
        $year=date("Y",$need);
        $month=date("m",$need);
        $day=date("d",$need);
        $i=0;
        $subtype="";
        $subtypetemp="";
        list( $Dyear, $Dmonth, $Dday ) = gregorian_to_mds($year, $month, $day);
        while($i<strlen($format))
        {
            $subtype=substr($format,$i,1);
            if($subtypetemp=="\\")
            {
                $result.=$subtype;
                $i++;
                continue;
            }

            switch ($subtype)
            {

                case "A":
                    $result1=date("a",$need);
                    if($result1=="pm") $result.= "بعد از ظهر";
                    else $result.="قبل از ظهر";
                    break;

                case "a":
                    $result1=date("a",$need);
                    if($result1=="pm") $result.= "ب.ظ";
                    else $result.="ق.ظ";
                    break;
                case "d":
                    if($Dday<10)$result1="0".$Dday;
                    else    $result1=$Dday;
                    if($persianNumber==1) $result.=Convertnumber2farsi($result1);
                    else $result.=$result1;
                    break;
                case "D":
                    $result1=date("D",$need);
                    if($result1=="Thu") $result1="پ";
                    else if($result1=="Sat") $result1="ش";
                    else if($result1=="Sun") $result1="ی";
                    else if($result1=="Mon") $result1="د";
                    else if($result1=="Tue") $result1="س";
                    else if($result1=="Wed") $result1="چ";
                    else if($result1=="Thu") $result1="پ";
                    else if($result1=="Fri") $result1="ج";
                    $result.=$result1;
                    break;
                case"F":
                    $result.=monthname($Dmonth);
                    break;
                case "g":
                    $result1=date("g",$need);
                    if($persianNumber==1) $result.=Convertnumber2farsi($result1);
                    else $result.=$result1;
                    break;
                case "G":
                    $result1=date("G",$need);
                    if($persianNumber==1) $result.=Convertnumber2farsi($result1);
                    else $result.=$result1;
                    break;
                    case "h":
                    $result1=date("h",$need);
                    if($persianNumber==1) $result.=Convertnumber2farsi($result1);
                    else $result.=$result1;
                    break;
                case "H":
                    $result1=date("H",$need);
                    if($persianNumber==1) $result.=Convertnumber2farsi($result1);
                    else $result.=$result1;
                    break;
                case "i":
                    $result1=date("i",$need);
                    if($persianNumber==1) $result.=Convertnumber2farsi($result1);
                    else $result.=$result1;
                    break;
                case "j":
                    $result1=$Dday;
                    if($persianNumber==1) $result.=Convertnumber2farsi($result1);
                    else $result.=$result1;
                    break;
                case "l":
                    $result1=date("l",$need);
                    if($result1=="Saturday") $result1="شنبه";
                    else if($result1=="Sunday") $result1="یکشنبه";
                    else if($result1=="Monday") $result1="دوشنبه";
                    else if($result1=="Tuesday") $result1="سه شنبه";
                    else if($result1=="Wednesday") $result1="چهار شنبه";
                    else if($result1=="Thursday") $result1="پنج شنبه";
                    else if($result1=="Friday") $result1="جمعه";
                    $result.=$result1;
                    break;
                case "m":
                    if($Dmonth<10) $result1="0".$Dmonth;
                    else    $result1=$Dmonth;
                    if($persianNumber==1) $result.=Convertnumber2farsi($result1);
                    else $result.=$result1;
                    break;
                case "M":
                    $result.=short_monthname($Dmonth);
                    break;
                case "n":
                    $result1=$Dmonth;
                    if($persianNumber==1) $result.=Convertnumber2farsi($result1);
                    else $result.=$result1;
                    break;
                case "s":
                    $result1=date("s",$need);
                    if($persianNumber==1) $result.=Convertnumber2farsi($result1);
                    else $result.=$result1;
                    break;
                case "S":
                    $result.="ام";
                    break;
                case "t":
                    $result.=lastday ($month,$day,$year);
                    break;
                case "w":
                    $result1=date("w",$need);
                    if($persianNumber==1) $result.=Convertnumber2farsi($result1);
                    else $result.=$result1;
                    break;
                case "y":
                    $result1=substr($Dyear,2,4);
                    if($persianNumber==1) $result.=Convertnumber2farsi($result1);
                    else $result.=$result1;
                    break;
                case "Y":
                    $result1=$Dyear;
                    if($persianNumber==1) $result.=Convertnumber2farsi($result1);
                    else $result.=$result1;
                    break;
                case "U" :
                    $result.=mktime();
                    break;
                case "Z" :
                    $result.=days_of_year($Dmonth,$Dday,$Dyear);
                    break;
                case "L" :
                    list( $tmp_year, $tmp_month, $tmp_day ) = mds_to_gregorian(1384, 12, 1);
                    echo $tmp_day;
                    /*if(lastday($tmp_month,$tmp_day,$tmp_year)=="31")
                        $result.="1";
                    else
                        $result.="0";
                        */
                    break;
                default:
                    $result.=$subtype;
            }
            $subtypetemp=substr($format,$i,1);
        $i++;
        }
        return $result;
    }
}

if ( ! function_exists('make_time'))
{
    function make_time($hour="",$minute="",$second="",$Dmonth="",$Dday="",$Dyear="")
    {
        if(!$hour && !$minute && !$second && !$Dmonth && !$Dmonth && !$Dday && !$Dyear)
            return mktime();
        if ($Dmonth > 11) die("Incorrect month number");
        list( $year, $month, $day ) = mds_to_gregorian($Dyear, $Dmonth, $Dday);
        $i=mktime($hour,$minute,$second,$month,$day,$year);
        return $i;
    }
}

if ( ! function_exists('mstart'))
{
    ///Find num of Day Begining Of Month ( 0 for Sat & 6 for Sun)
    function mstart($month,$day,$year)
    {
        list( $Dyear, $Dmonth, $Dday ) = gregorian_to_mds($year, $month, $day);
        list( $year, $month, $day ) = mds_to_gregorian($Dyear, $Dmonth, "1");
        $timestamp=mktime(0,0,0,$month,$day,$year);
        return date("w",$timestamp);
    }
}

if ( ! function_exists('lastday'))
{
    //Find Number Of Days In This Month
    function lastday ($month,$day,$year)
    {
        $Dday2="";
        $jdate2 ="";
        $lastdayen=date("d",mktime(0,0,0,$month+1,0,$year));
        list( $Dyear, $Dmonth, $Dday ) = gregorian_to_mds($year, $month, $day);
        $lastdatep=$Dday;
        $Dday=$Dday2;
        while($Dday2!="1")
        {
            if($day<$lastdayen)
            {
                $day++;
                list( $Dyear, $Dmonth, $Dday2 ) = gregorian_to_mds($year, $month, $day);
                if($jdate2=="1") break;
                if($jdate2!="1") $lastdatep++;
            }
            else
            {
                $day=0;
                $month++;
                if($month==13)
                {
                        $month="1";
                        $year++;
                }
            }

        }
        return $lastdatep-1;
    }
}

if ( ! function_exists('days_of_year'))
{
    //Find days in this year untile now
    function days_of_year($Dmonth, $Dday, $Dyear)
    {
        $year="";
        $month="";
        $year="";
        $result="";
        if($Dmonth=="01")
            return $Dday;
        for ($i=1;$i<$Dmonth || $i==12;$i++)
        {
            list( $year, $month, $day ) = mds_to_gregorian($Dyear, $i, "1");
            $result+=lastday($month,$day,$year);
        }
        return $result+$Dday;
    }
}

if ( ! function_exists('monthname'))
{
    //translate number of month to name of month
    function monthname($month)
    {

        if($month=="01") return "حمل";

        if($month=="02") return "ثور";

        if($month=="03") return "جوزا";

        if($month=="04") return  "سرطان";

        if($month=="05") return "اسد";

        if($month=="06") return "سنبله";

        if($month=="07") return "میزان";

        if($month=="08") return "عقرب";

        if($month=="09") return "قوس";

        if($month=="10") return "جدی";

        if($month=="11") return "دلو";

        if($month=="12") return "حوت";
    }
}

if ( ! function_exists('short_monthname'))
{
    function short_monthname($month)
    {

        if($month=="01") return "حمل";

        if($month=="02") return "ثور";

        if($month=="03") return "جوز";

        if($month=="04") return  "سرط";

        if($month=="05") return "اسد";

        if($month=="06") return "سنب";

        if($month=="07") return "میز";

        if($month=="08") return "عقر";

        if($month=="09") return "قوس";

        if($month=="10") return "جدی";

        if($month=="11") return "دلو";

        if($month=="12") return "حوت";
    }
}

if ( ! function_exists('Convertnumber2farsi'))
{
    //converts the numbers into the persian's number
    function Convertnumber2farsi($srting)
    {
        $num0="0";
        $num1="1";
        $num2="2";
        $num3="3";
        $num4="4";
        $num5="5";
        $num6="6";
        $num7="7";
        $num8="8";
        $num9="9";

        $stringtemp="";
        $len=strlen($srting);
        for($sub=0;$sub<$len;$sub++)
        {
             if(substr($srting,$sub,1)=="0")$stringtemp.=$num0;
             elseif(substr($srting,$sub,1)=="1")$stringtemp.=$num1;
             elseif(substr($srting,$sub,1)=="2")$stringtemp.=$num2;
             elseif(substr($srting,$sub,1)=="3")$stringtemp.=$num3;
             elseif(substr($srting,$sub,1)=="4")$stringtemp.=$num4;
             elseif(substr($srting,$sub,1)=="5")$stringtemp.=$num5;
             elseif(substr($srting,$sub,1)=="6")$stringtemp.=$num6;
             elseif(substr($srting,$sub,1)=="7")$stringtemp.=$num7;
             elseif(substr($srting,$sub,1)=="8")$stringtemp.=$num8;
             elseif(substr($srting,$sub,1)=="9")$stringtemp.=$num9;
             else $stringtemp.=substr($srting,$sub,1);
        }
    return   $stringtemp;

    }///end conver to number in persian
}

if ( ! function_exists('is_kabise'))
{
    function is_kabise($year)
    {
        if($year%4==0 && $year%100!=0)
            return true;
        return false;
    }
}

if ( ! function_exists('mcheckdate'))
{
    function mcheckdate($month,$day,$year)
    {
        $m_days_in_month = array(31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29);
        if($month<=12 && $month>0)
        {
            if($m_days_in_month[$month-1]>=$day &&  $day>0)
                return 1;
            if(is_kabise($year))
                echo "Asdsd";
            if(is_kabise($year) && $m_days_in_month[$month-1]==31)
                return 1;
        }

        return 0;

    }
}

if ( ! function_exists('mtime'))
{
    function mtime()
    {
        return mktime() ;
    }
}

if ( ! function_exists('mgetdate'))
{
    function mgetdate($timestamp="")
    {
        if($timestamp=="")
            $timestamp=mktime();

        return array(
            0=>$timestamp,
            "seconds"=>mds_date("s",$timestamp),
            "minutes"=>mds_date("i",$timestamp),
            "hours"=>mds_date("G",$timestamp),
            "mday"=>mds_date("j",$timestamp),
            "wday"=>mds_date("w",$timestamp),
            "mon"=>mds_date("n",$timestamp),
            "year"=>mds_date("Y",$timestamp),
            "yday"=>days_of_year(mds_date("m",$timestamp),mds_date("d",$timestamp),mds_date("Y",$timestamp)),
            "weekday"=>mds_date("l",$timestamp),
            "month"=>mds_date("F",$timestamp),
        );
    }
}

if ( ! function_exists('div'))
{
    function div($a,$b)
    {
        return (int) ($a / $b);
    }
}

if ( ! function_exists('gregorian_to_mds'))
{
    function gregorian_to_mds ($g_y, $g_m, $g_d)
    {
        $g_days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        $m_days_in_month = array(31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29);

       $gy = $g_y-1600;
       $gm = $g_m-1;
       $gd = $g_d-1;

       $g_day_no = 365*$gy+div($gy+3,4)-div($gy+99,100)+div($gy+399,400);

       for ($i=0; $i < $gm; ++$i)
          $g_day_no += $g_days_in_month[$i];
       if ($gm>1 && (($gy%4==0 && $gy%100!=0) || ($gy%400==0)))
          /* leap and after Feb */
          $g_day_no++;
       $g_day_no += $gd;

       $m_day_no = $g_day_no-79;

       $j_np = div($m_day_no, 12053); /* 12053 = 365*33 + 32/4 */
       $m_day_no = $m_day_no % 12053;

       $jy = 979+33*$j_np+4*div($m_day_no,1461); /* 1461 = 365*4 + 4/4 */

       $m_day_no %= 1461;

       if ($m_day_no >= 366) {
          $jy += div($m_day_no-1, 365);
          $m_day_no = ($m_day_no-1)%365;
       }

       for ($i = 0; $i < 11 && $m_day_no >= $m_days_in_month[$i]; ++$i)
          $m_day_no -= $m_days_in_month[$i];
       $jm = $i+1;
       $jd = $m_day_no+1;

       return array($jy, $jm, $jd);
    }
}

if ( ! function_exists('mds_to_gregorian'))
{
    function mds_to_gregorian($m_y, $j_m, $m_d)
    {
        $g_days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        $m_days_in_month = array(31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29);



       $jy = $m_y-979;
       $jm = $j_m-1;
       $jd = $m_d-1;

       $m_day_no = 365*$jy + div($jy, 33)*8 + div($jy%33+3, 4);
       for ($i=0; $i < $jm; ++$i)
          $m_day_no += $m_days_in_month[$i];

       $m_day_no += $jd;

       $g_day_no = $m_day_no+79;

       $gy = 1600 + 400*div($g_day_no, 146097); /* 146097 = 365*400 + 400/4 - 400/100 + 400/400 */
       $g_day_no = $g_day_no % 146097;

       $leap = true;
       if ($g_day_no >= 36525) /* 36525 = 365*100 + 100/4 */
       {
          $g_day_no--;
          $gy += 100*div($g_day_no,  36524); /* 36524 = 365*100 + 100/4 - 100/100 */
          $g_day_no = $g_day_no % 36524;

          if ($g_day_no >= 365)
             $g_day_no++;
          else
             $leap = false;
       }

       $gy += 4*div($g_day_no, 1461); /* 1461 = 365*4 + 4/4 */
       $g_day_no %= 1461;

       if ($g_day_no >= 366) {
          $leap = false;

          $g_day_no--;
          $gy += div($g_day_no, 365);
          $g_day_no = $g_day_no % 365;
       }

       for ($i = 0; $g_day_no >= $g_days_in_month[$i] + ($i == 1 && $leap); $i++)
          $g_day_no -= $g_days_in_month[$i] + ($i == 1 && $leap);
       $gm = $i+1;
       $gd = $g_day_no+1;

       return array($gy, $gm, $gd);
    }
}



 ?>