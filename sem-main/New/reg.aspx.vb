Imports System.Data.OleDb

Public Class reg

    Inherits System.Web.UI.Page
    Dim con As New OleDbConnection("Provider=Microsoft.Jet.OLEDB.4.0;Data Source=C:\parth\sem5\asp\User.mdb")
    Dim cmd As New OleDbCommand
    Dim ad As New OleDbDataAdapter
    Dim ds As New DataSet

    Protected Sub Page_Load(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Load

    End Sub


    Protected Sub Button1_Click(sender As Object, e As EventArgs) Handles Button1.Click
        con.Open()
        cmd.CommandText = "insert into login values(@ID,@Uname,@Email,@Password)"
        cmd.Parameters.AddWithValue("@ID", Val(TextBox2.Text))
        cmd.Parameters.AddWithValue("@Uname", TextBox3.Text)
        cmd.Parameters.AddWithValue("@Email", TextBox4.Text)
        cmd.Parameters.AddWithValue("@Password", TextBox5.Text)
        cmd.Connection = con
        ad.SelectCommand = cmd
        cmd.ExecuteNonQuery()
        ds.Clear()
        cmd.Parameters.Clear()
        Response.Redirect("Login.aspx")
        con.Close()
    End Sub
End Class