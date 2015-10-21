using System;
using System.Collections.Generic;
using System.Globalization;
using System.Linq;
using System.Security.Cryptography;
using System.Text;
using System.Web;


/// <summary>
/// AESUtil AES加密器
/// 默认128位加密
/// </summary>
public class AESUtil
{
    /// <summary>
    /// 加密
    /// </summary>
    /// <param name="content">待加密内容</param>
    /// <param name="key">加密密匙</param>
    /// <returns>十六进制字符串</returns>
    public static String Encrypt(String content, String key)
    {
        if (string.IsNullOrEmpty(content) || key.Length < 16)
            return null;

        Byte[] toEncryptArray = Encoding.UTF8.GetBytes(content);

        RijndaelManaged rm = new RijndaelManaged();
        rm.Key = Encoding.UTF8.GetBytes(key.Substring(0, 16));
        rm.Mode = CipherMode.ECB;
        rm.Padding = PaddingMode.PKCS7;

        ICryptoTransform cTransform = rm.CreateEncryptor();
        Byte[] resultArray = cTransform.TransformFinalBlock(toEncryptArray, 0, toEncryptArray.Length);

        return ParseByte2HexStr(resultArray);
    }

    /// <summary>
    /// 将二进制转换为16进制
    /// </summary>
    /// <param name="input">待转换数据</param>
    /// <returns></returns>
    private static string ParseByte2HexStr(byte[] input)
    {
        if (input == null)
            return null;

        StringBuilder output = new StringBuilder(input.Length * 2);

        for (int i = 0; i < input.Length; i++)
        {
            int current = input[i] & 0xff;
            if (current < 16)
                output.Append("0");
            output.Append(current.ToString("x"));
        }

        return output.ToString().ToUpper();
    }

    /// <summary>
    /// 解密
    /// </summary>
    /// <param name="content">待解密字符串（十六进制字符串）</param>
    /// <param name="key">密匙</param>
    /// <returns></returns>
    public static String Decrypt(String content, String key)
    {
        if (string.IsNullOrEmpty(content) || key.Length < 16)
            return null;

        Byte[] toEncryptArray = ParseHexStr2Byte(content);

        RijndaelManaged rm = new RijndaelManaged();
        rm.Key = Encoding.UTF8.GetBytes(key.Substring(0, 16));
        rm.Mode = CipherMode.ECB;
        rm.Padding = PaddingMode.PKCS7;

        ICryptoTransform cTransform = rm.CreateDecryptor();
        Byte[] resultArray = cTransform.TransformFinalBlock(toEncryptArray, 0, toEncryptArray.Length);

        return Encoding.UTF8.GetString(resultArray);
    }

    //177CFF08C9 
    /// <summary>
    /// 将16进制转换为二进制
    /// </summary>
    /// <param name="hexStr">十六进制字符串</param>
    /// <returns></returns>
    private static byte[] ParseHexStr2Byte(String hexStr)
    {
        if (hexStr.Length < 1)
            return null;
        int length = hexStr.Length / 2;
        byte[] result = new byte[length];
        for (int i = 0; i < length; i++)
        {
            int high = int.Parse(hexStr.Substring(i * 2, 1), NumberStyles.AllowHexSpecifier);
            int low = int.Parse(hexStr.Substring(i * 2 + 1, 1), NumberStyles.AllowHexSpecifier);
            result[i] = (byte)(high * 16 + low);
        }
        return result;
    }
}
