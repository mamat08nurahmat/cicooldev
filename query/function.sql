-- DEFINER=`root`@`localhost` --->>C245037_biolgb`@`%

>>>>>>>>>>>>> Fv
DELIMITER $$

DROP FUNCTION IF EXISTS `C245037_InterAct`.`Fv` $$
CREATE DEFINER=`C245037_biolgb`@`%` FUNCTION `Fv`(
    Rate Double,
    nPer Double,
    mPmt Double,
    Pv Double,
    mType Integer
  ) RETURNS double
BEGIN

  Declare mVal double;

/*
In excel it should look like this:
FV(Rate,nPer,mPmt,Pv,mType)

Rate = Interest rate
nPer = Total number of payments
mPmt = Monthly Payments
Pv = Principal Value
mType = Optional. It indicates when the payments are due. Type can be
        one of the following values:
        Value 	Explanation
          0 	Payments are due at the end of the period. (default)
          1 	Payments are due at the beginning of the period.

Example:
Select FV(.05/12,1,10327.65, 235407.36,0);
Result: -236,388.22800973
Expected: -226,060.58

Select FV(.07/12,24,1097.75, 165000,0);
Result: -189,718.16362685
Expected: -161,526.66

*/

Select -(Rate * (pow(1 + Rate, nPer) - 1) / Rate + Pv
            * pow(1 + Rate, nPer)) into mVal;

if mType = 1 then
   set mVal = mVal * (1 + Rate);
END IF;

Return mVal;

END $$

DELIMITER ;

>>>>>>>>>>>>> PMT
DELIMITER $$

DROP FUNCTION IF EXISTS `C245037_InterAct`.`PMT` $$
CREATE DEFINER=`C245037_biolgb`@`%` FUNCTION `PMT`(
      Rate double,
      Nper double,
      Pv double,
      mFv double,
      mType int
     ) RETURNS double
BEGIN

  Declare mVal double;


/*
In excel it should look like this:
PMT(rate,nper,pv,fv,type)

Rate - interest rate for the loan.
Nper - total number of payments for the loan.
Pv - present value, or the total amount that a series of future payments
     is worth now; also known as the principal.
Fv - future value, or a cash balance you want to attain after the last
     payment is made. If fv is omitted, it is assumed to be 0 (zero),
     that is, the future value of a loan is 0.
Type - number 0 (zero) or 1 and indicates when payments are due.
  Set type equal to If payments are due
    0 or omitted At the end of the period
    1 At the beginning of the period

Example:
This example shows an loan interest of 5% per year, using 1 payment per month
equivalent to 12 months, 2 years to pay multiplied by 12 months, Loan amount
without interest of 235407.36, no Future Value (consideration for country's annual
economic currency devaluation) and 0 Type indicating that the payments are due at
the end of the period.

Select PMT(.05/12,2*12,235407.36,0,0);
Result: -10327.647952488

*/

Select Rate/(pow(1 + Rate, nPer) - 1)
       * -(Pv * pow(1 + Rate, nPer) + mFv) into mVal;

if mType = 1 then
   set mVal = mVal/(1 + Rate);
END IF;

return mVal;


END $$

DELIMITER ;

>>>>>>>>>>>>> IPMT
DELIMITER $$

DROP FUNCTION IF EXISTS `C245037_InterAct`.`IPMT` $$
CREATE DEFINER=`C245037_biolgb`@`%` FUNCTION `IPMT`(
      Rate Double,
      Per INT,
      nPer INT,
      Pv Double,
      mFv Double,
      mType INT
      ) RETURNS double
BEGIN

Declare mVal Double;

/*
In excel it should look like this:
IPMT(rate,per,nper,pv,fv,type)

Rate - interest rate per period.
Per  - period for which you want to find the interest and must be in the
       range 1 to nper.
Nper - total number of payments for the loan.
Pv - present value, or the total amount that a series of future payments
       is worth now; also known as the principal.
Fv - future value, or a cash balance you want to attain after the last
       payment is made. If fv is omitted, it is assumed to be 0 (zero),
       that is, the future value of a loan is 0.
Type - number 0 (zero) or 1 and indicates when payments are due.
       Set type equal to If payments are due
          0 or omitted At the end of the period
          1 At the beginning of the period

Select IPMT(.05/12,1,2*12,235407.36,0,0);
Result: -980.86384306176

*/

SELECT Fv(Rate, Per - 1, pmt(Rate, nPer, Pv, mFv, mType), Pv, mType) * Rate
       into mVal;

if mType = 1 then
   set mVal = mVal/(1 + Rate);
END IF;

return mVal;

END $$

DELIMITER ;

>>>>>>>>>>>>> PPMT
DELIMITER $$

DROP FUNCTION IF EXISTS `C245037_InterAct`.`PPMT` $$
CREATE DEFINER=`C245037_biolgb`@`%` FUNCTION `PPMT`(
      Rate Double,
      Per INT,
      nPer INT,
      Pv Double,
      mFv Double,
      mType INT
      ) RETURNS double
BEGIN

Declare mVal Double;

/*
In excel it should look like this:
PPMT(rate,per,nper,pv,fv,type)

Rate - interest rate per period.
Per  - period for which you want to find the interest and must be in the
       range 1 to nper.
Nper - total number of payments for the loan.
Pv - present value, or the total amount that a series of future payments
       is worth now; also known as the principal.
Fv - future value, or a cash balance you want to attain after the last
       payment is made. If fv is omitted, it is assumed to be 0 (zero),
       that is, the future value of a loan is 0.
Type - number 0 (zero) or 1 and indicates when payments are due.
       Set type equal to If payments are due
          0 or omitted At the end of the period
          1 At the beginning of the period

Select PPMT(.05/12,1,2*12,235407.36,0,0);
Result: -9346.7841094258
*/

SELECT pmt(Rate, nPer, Pv, mFv, mType) -
       ipmt(Rate, Per, nPer, Pv, mFv, mType) into mVal;

if mType = 1 then
   set mVal = mVal/(1 + Rate);
END IF;

return mVal;

END $$

DELIMITER ;

