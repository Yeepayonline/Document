using System;
using System.Collections.Generic;
using System.Linq;
using System.Security.Cryptography;
using System.Text;
using System.Web;

 
    public class HMACUtil
    {
        /// <summary>
        /// 获得MD5
        /// </summary>
        /// <param name="input"></param>
        /// <returns></returns>
        public static string GetMd5Hash(string input)
        {
            using (MD5 md5Hash = MD5.Create())
            {

                byte[] data = md5Hash.ComputeHash(Encoding.UTF8.GetBytes(input));

                StringBuilder sBuilder = new StringBuilder();
                for (int i = 0; i < data.Length; i++)
                {
                    sBuilder.Append(data[i].ToString("x2"));
                }
                return sBuilder.ToString();
            }
        }


        public static string GetHMAC(string customernumber, string requestid, string amount, string assure, string productname, string productcat, string productdesc, string divideinfo, string callbackurl, string webcallbackurl, string bankid, string period, string memo, string hmacKey)
        {
            string sign = "{0}{1}{2}{3}{4}{5}{6}{7}{8}{9}{10}{11}{12}";
            if (!string.IsNullOrEmpty(productname))
            {
                productname = HttpUtility.UrlEncode(productname, Encoding.UTF8);
            }
            if (!string.IsNullOrEmpty(productcat))
            {
                productcat = HttpUtility.UrlEncode(productcat, Encoding.UTF8);
            }
            if (!string.IsNullOrEmpty(productdesc))
            {
                productdesc = HttpUtility.UrlEncode(productdesc, Encoding.UTF8);
            }
            if (!string.IsNullOrEmpty(memo))
            {
                memo = HttpUtility.UrlEncode(memo, Encoding.UTF8);
            }
            sign = string.Format(sign, customernumber, requestid, amount, assure, productname, productcat, productdesc, divideinfo, callbackurl, webcallbackurl, bankid, period, memo);

            return GetMd5Hash(sign);
        }


        /// <summary>
        /// MD5值比较
        /// </summary>
        /// <param name="input"></param>
        /// <param name="hash"></param>
        /// <returns></returns>
        public static bool VerifyMd5Hash(string input, string hash)
        {
            string hashOfInput = GetMd5Hash(input);
            StringComparer comparer = StringComparer.OrdinalIgnoreCase;

            if (0 == comparer.Compare(hashOfInput, hash))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }
 