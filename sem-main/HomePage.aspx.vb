Imports System.Data.OleDb
Imports Microsoft.VisualBasic.ApplicationServices

Public Class HomePage
    Inherits System.Web.UI.Page

    Dim con As New OleDbConnection("Provider=Microsoft.ACE.OLEDB.12.0;Data Source=C:\Users\Lenovo\OneDrive\Documents\Data.accdb")
    Dim cmd As New OleDbCommand
    Dim ad As New OleDbDataAdapter
    Dim ds As New DataSet

    Sub display()
        con.Open()
        cmd.CommandText = "SELECT * FROM Book_CAT"
        cmd.Connection = con
        ad.SelectCommand = cmd
        cmd.ExecuteNonQuery()
        ds.Clear()
        ad.Fill(ds, "Book_CAT")
        GridView1.DataSource = ds.Tables("Book_CAT")
        con.Close()
        GridView1.DataBind()

    End Sub

    Protected Sub Page_Load(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Load
        display()
    End Sub

    Protected Sub Button2_Click(sender As Object, e As EventArgs) Handles Button2.Click
        con.Open()
        cmd.CommandText = "UPDATE Book_CAT SET BBook='" & TextBox2.Text & "' WHERE ID=" & Val(TextBox3.Text)
        cmd.Connection = con
        ad.SelectCommand = cmd
        cmd.ExecuteNonQuery()
        con.Close()

        display()
    End Sub

    Protected Sub Button3_Click(sender As Object, e As EventArgs) Handles Button3.Click
        con.Open()
        cmd.CommandText = "DELETE FROM Book_CAT WHERE ID=" & Val(TextBox1.Text)
        cmd.Connection = con
        ad.SelectCommand = cmd
        cmd.ExecuteNonQuery()
        con.Close()

        display()
    End Sub
End Class