using Guna.UI2.WinForms;
using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Data.SqlClient;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace OEAMS
{
    public static class Helper
    {
        public static Color PrimaryColor = Color.FromArgb(0, 120, 212);
        //public static Color SecondaryColor = Color.FromArgb(255, 249, 175);
        //public static Color PurpleColor = Color.FromArgb(178, 176, 232);
        public static void MoveFromTo(Form form1, Form form2)
        {
            form1.Hide();
            form2.Show();
        }
        public static void SQLInsert(string table, string[] columns, Guna2TextBox[] textBoxes)
        {
            string connectionString = "Server=localhost;Database=OEAMS;User Id=root;Password=1234567890;SslMode=none;";
            using (MySqlConnection connection = new MySqlConnection(connectionString))
            {
                connection.Open();
                string sqlStatement = "insert into " + table + "(";
                foreach(string column in columns)
                {
                    sqlStatement += column + ", ";
                }
                sqlStatement = sqlStatement.Substring(0, sqlStatement.Length - 2);
                sqlStatement += ") values(";
                foreach(Guna2TextBox textBox in textBoxes)
                {
                    sqlStatement += "'" + textBox.Text + "', ";
                }
                sqlStatement = sqlStatement.Substring(0, sqlStatement.Length - 2);
                sqlStatement += ");";
                using (MySqlCommand command = new MySqlCommand(sqlStatement, connection))
                {
                    try
                    {
                        string successMessage = "Insertion Successful of: ";
                        foreach(Guna2TextBox textBox in textBoxes)
                        {
                            successMessage += textBox.Text + ", ";
                        }
                        sqlStatement = sqlStatement.Substring(0, sqlStatement.Length - 2);
                        command.ExecuteNonQuery();
                        MessageBox.Show(successMessage);
                    }
                    catch (MySqlException ex)
                    {
                        MessageBox.Show("Inserted Failed: " + ex.Message);
                    }
                }
            }
        }
    }
}
